<?php

namespace App\Http\Controllers;

use Stripe;
use App\Models\Informations;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;

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
    public function store(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51IKNFzDzVSz0t3svjdJRAESEW0KkR73oB8uRitSg1cc9aJQEHEEV5AWsAc8LBl77OIOcuX5yqWd3Kj8mj9lSBu2S00CMiWhzzo');
            function calculateOrderAmount(array $items): int {
            // Replace this constant with a calculation of the order's amount
            // Calculate the order total on the server to prevent
            // customers from directly manipulating the amount on the client
            return 1400;
            }
            header('Content-Type: application/json');
    
            // retrieve JSON from POST body
            $json_str = file_get_contents('php://input');
            $json_obj = json_decode($json_str);
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => calculateOrderAmount($json_obj->items),
                'currency' => 'usd',
            ]);
            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];
            echo json_encode($output);
    
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
