<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Informations;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Requests\InvoiceRequest;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    //returning the checkout view
    public function checkoutIndex()
    {
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
        Stripe::setApiKey('sk_test_51IKNFzDzVSz0t3svjdJRAESEW0KkR73oB8uRitSg1cc9aJQEHEEV5AWsAc8LBl77OIOcuX5yqWd3Kj8mj9lSBu2S00CMiWhzzo');

        $stripe = new \Stripe\StripeClient(
            'sk_test_51IKNFzDzVSz0t3svjdJRAESEW0KkR73oB8uRitSg1cc9aJQEHEEV5AWsAc8LBl77OIOcuX5yqWd3Kj8mj9lSBu2S00CMiWhzzo'
          );

        $description = $request->name . ' ' . $request->lastname;
        $stripe_tok = $stripe->tokens->create([
            'card' => [
              'number' => $request->card_number,
              'exp_month' => $request->card_exp_month,
              'exp_year' => $request->card_exp_year,
              'cvc' => $request->card_cvc,
            ],
        ])->id;
        
        //need to multiply the total price by 100x bcs the stripe is working with cents
        $price = Cart::subtotal() * 100;
        
        //trying to charge the amount
        try {
            $charge = Charge::create(array(
                "amount" => $price,
                "currency" => "eur",
                "source" => $stripe_tok,
                "description" => $description
            ));

            //create the PDF based on time + add randum number for avoid duplicating pdf name
            $pdf_name = time() . '_' . rand(1, 99) . ".pdf";
            $path = storage_path('app/invoices/' . $pdf_name);
            //getting the all data from request and putting them tu invoice view for creting and saving the invoice
            $data = $request->all();
            $pdf = PDF::loadView('admin.invoice', compact('data'))->save($path);

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
            }
            //inserting all bought products to DB
            Order::insert($products_array);

            //clearing the cart
            Cart::destroy();
            //returning to thank you page
            return redirect()->route('thankyou.index');

        //if we cant charge, than we will return the user to homepage
        }catch(\Exception $e) {
            return redirect()->route('home.index');
        }
    }
}
