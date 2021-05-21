<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Exception\CardException;
use Stripe\Stripe;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Informations;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Requests\InvoiceRequest;
use App\Models\StorageProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Stripe\StripeClient;

class CheckoutController extends Controller
{
    //returning the checkout view
    public function checkoutIndex()
    {
        //if cart is empty, cant access the checkout page
        if(count(Cart::content()) == 0) {
            return redirect()->route('home.index');
        }

        //if the user is logged in, get his informations. If not, return the view with nothing.
        if(auth()->user()) {
            return view('guest.checkout', ['informations' => Informations::where('user_id', auth()->user()->id)->first()]);
        }
        else {
            return view('guest.checkout', ['informations' => []]);
        }
    }

    public function checkoutStore(InvoiceRequest $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $stripe = new StripeClient(
            env('STRIPE_SECRET')
          );

        //create order_id based on time + random number
        $order_id = time() . '_' . rand(1, 99);

        //need to multiply the total price by 100x bcs the stripe is working with cents
        $price = Cart::subtotal() * 100;

        //trying to charge the amount
        try {
            $stripe_tok = $stripe->tokens->create([
                'card' => [
                    'number' => $request->card_number,
                    'exp_month' => $request->card_exp_month,
                    'exp_year' => $request->card_exp_year,
                    'cvc' => $request->card_cvc,
                ],
            ])->id;

            Charge::create(array(
                "amount" => $price,
                "currency" => "eur",
                "source" => $stripe_tok,
                "description" => $order_id . ' | ' . env('APP_NAME'),
            ));

        //if we cant charge, than we will return the user to homepage
        } catch(CardException $e) {

            return redirect()->back()->withErrors($e->getMessage());

        }

        //create the PDF based on order_id
        $pdf_name = $order_id . ".pdf";
        $path = storage_path('app/invoices/' . $pdf_name);

        //getting the all data from request and putting them tu invoice view for creting and saving the invoice
        $data = $request->all();
        PDF::loadView('admin.invoice', compact('data'))->save($path);

        //save pdf name to database
        //if the user is not logged in, than the user_id in DB will be null
        $new_invoice = new Invoice;
        if(auth()->user()) {
            $new_invoice->user_id = auth()->user()->id;
        }
        $new_invoice->invoice_name = $pdf_name;
        $new_invoice->town_name = $request->town;
        $new_invoice->save();

        //inserting bought products to DB
        $last_id_invoice = $new_invoice->id;

        //get the user id if is logged in, if not, set to NULL
        $user_id = (auth()->user()) ? auth()->user()->id : NULL;

        foreach(Cart::content() as $product) {
            $products_array[] = [
                'user_id' => $user_id,
                'invoice_id' => $last_id_invoice,
                'product_name' => $product->name,
                'quantity' => $product->qty,
                'price' => $product->price,
            ];

            //decrement the product amount in our db
            StorageProduct::where('product_id', $product->id)
                ->decrement('product_amount', $product->qty);
        }

        //inserting all bought products to DB
        Order::insert($products_array);

        //clearing the cart
        Cart::destroy();

        //returning to thank you page
        return redirect()->route('thankyou.index')->with(['order_completed' => 'completed']);
    }
}
