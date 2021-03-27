<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Stripe\Service\OrderService;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //show the order by id in invoice table
    public function showOrder($id) {
        //find or fail to find the invoice
        Invoice::findOrFail($id);

        //getting all the products in order to display them
        $all_products = Order::all()->where('invoice_id', $id);
        
        //total sum of all products in order
        $all_products_price = Order::where('invoice_id', $id)->sum(DB::raw('price * quantity'));

        return view('admin.show-order', [
            'order' => $all_products,
            'total_sum' => $all_products_price,
        ]);
    }
}
