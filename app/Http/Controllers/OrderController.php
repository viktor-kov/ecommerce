<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showOrder($id) {
        $all_products = Order::all()->where('invoice_id', $id);
        
        $total_sum = 0;
        foreach($all_products as $product) {
            $price = $product->price * $product->quantity;
            $total_sum += $price;
        }

        return view('show-order', [
            'order' => $all_products,
            'total_sum' => $total_sum,
        ]);
    }
}
