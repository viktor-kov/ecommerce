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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()) {
            return view('checkout', ['informations' => Informations::where('user_id', auth()->user()->id)->latest()->first()]);
        }
        else {
            return view('checkout', ['informations' => []]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceRequest $request)
    {
        Stripe::setApiKey('sk_test_51IKNFzDzVSz0t3svjdJRAESEW0KkR73oB8uRitSg1cc9aJQEHEEV5AWsAc8LBl77OIOcuX5yqWd3Kj8mj9lSBu2S00CMiWhzzo');

        $stripe = new \Stripe\StripeClient(
            'sk_test_51IKNFzDzVSz0t3svjdJRAESEW0KkR73oB8uRitSg1cc9aJQEHEEV5AWsAc8LBl77OIOcuX5yqWd3Kj8mj9lSBu2S00CMiWhzzo'
          );

        $description = $request->name . ' ' . $request->lastname;
        $stripe_tok =$stripe->tokens->create([
            'card' => [
              'number' => $request->card_number,
              'exp_month' => $request->card_exp_month,
              'exp_year' => $request->card_exp_year,
              'cvc' => $request->card_cvc,
            ],
        ])->id;

        $price = Cart::subtotal() * 100;
        try {
            $charge = Charge::create(array(
                "amount" => $price,
                "currency" => "eur",
                "source" => $stripe_tok,
                "description" => $description
            ));

                //pdf create
                $pdf_name = time() . ".pdf";
                $path = storage_path('app/invoices/' . $pdf_name);
                $data = $request->all();
                $pdf = PDF::loadView('invoice', compact('data'))->save($path);

                //save pdf name to database
                //if the user is not logged in, than the user_id in DB will be null
                $new_invoice = new Invoice;
                if(auth()->user()) {
                    $new_invoice->user_id = auth()->user()->id;
                }
                $new_invoice->invoice_name = $pdf_name;
                $new_invoice->save();


                //inserting bought products to DB
                $last_id_invoice = $new_invoice->id;
                foreach(Cart::content() as $product) {
                    $products_array[] = [
                        'user_id' => auth()->user()->id,
                        'invoice_id' => $last_id_invoice,
                        'product_name' => $product->name,
                        'quantity' => $product->qty,
                        'price' => $product->price,
                    ];

                }
                //inserting all bought products to DB
                Order::insert($products_array);


            Cart::destroy();
            return redirect()->route('thankyou.index');
        }catch(\Exception $e) {
            dd($e);
            return redirect()->route('home.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
