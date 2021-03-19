<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //show the order by id in invoice table
    public function showOrder($id) {
        //find or fail to find the invoice
        Invoice::findOrFail($id);
        //getting all the products in order to display them
        $all_products = Order::all()->where('invoice_id', $id);
        
        //calculating the price
        $total_sum = 0;
        foreach($all_products as $product) {
            $price = $product->price * $product->quantity;
            $total_sum += $price;
        }

        return view('admin.show-order', [
            'order' => $all_products,
            'total_sum' => $total_sum,
        ]);
    }
}
