<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index() {
        return view('cart', [
            'featured_products' => Product::get()->random(4),
        ]);
    }

    public function store(Request $request) {

        $duplicates = Cart::search(function($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->product_id;
        });

        if($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index');
        }

        $product_id = $request->product_id;
        $product_name = $request->product_name;
        $product_price = Product::where('slug', $product_id)->value('price');
        $product_category = $request->product_category;

        Cart::add([
            'id' => $product_id,
            'name' => $product_name,
            'qty' => 1,
            'price' => $product_price,
            'options' => ['category' => $product_category]
        ])->associate('App\Models\Product');
    

        return redirect()->route('cart.index');
    }

    public function destroy($row_id) {
        Cart::remove($row_id);

        return redirect()->route('cart.index');
    }

    public function update($row_id, Request $request) {

        $qty = $request->qty;
        Cart::update($row_id, $qty);
        return redirect()->route('cart.index');
    }
}
