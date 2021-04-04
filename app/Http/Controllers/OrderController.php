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
        $invoice = Invoice::findOrFail($id);

        //getting all the products in order to display them
        $all_products = Order::all()->where('invoice_id', $id);
        
        //total sum of all products in order
        $all_products_price = Order::where('invoice_id', $id)->sum(DB::raw('price * quantity'));

        return view('admin.showOrder', [
            'order' => $all_products,
            'total_sum' => $all_products_price,
            'invoice' => $invoice,
        ]);
    }

    //show the order
    public function showOrderGuest($id) {
        //only  the logged in users can see their order
        if(auth()->user()) {
            
            $invoice = Invoice::where('id', $id)->first();
            $order = Order::where('invoice_id', $id)->get();
            $total_sum = Order::where('invoice_id', $id)->sum(DB::raw('price * quantity'));

            if($invoice->user_id == auth()->user()->id) {
                return view('guest.showOrderToGuest', [
                    'invoice' => $invoice, 
                    'order' => $order, 
                    'total_sum' => $total_sum,
                ]);
            }
            else {
                abort(403);
            }
        }
        else {
            return abort(403);
        }
    }

    public function showOrderCategory($category) {
        $orders = Invoice::where('status', $category)->get();

        return view('admin.orders', [
            'orders' => $orders,
        ]);
    }
}
