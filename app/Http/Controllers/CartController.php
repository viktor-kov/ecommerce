<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index() {
        return view('guest.cart', [
            'featured_products' => Product::get()->random(4),
        ]);
    }

    //store the product in cart
    public function store(Request $request) {

        //checking for duplicates
        $duplicates = Cart::search(function($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->product_id;
        });

        //if we have some duplicates, we will redirect to cart page
        if($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index');
        }
        
        $product_id = $request->product_id;
        $product = Product::where('slug', $product_id)->first();
        $product_name = $product->name;
        $product_price = $product->price;
        $product_category = $product->category;

        $product_photo = $product->photo_path;

        Cart::add([
            'id' => $product_id,
            'name' => $product_name,
            'qty' => 1,
            'price' => $product_price,
            'options' => [
                'category' => $product_category,
                'product_photo' => $product_photo,
            ]
        ])->associate('App\Models\Product');
    

        return redirect()->route('cart.index')->with('success', __('cart.added-to-cart'));
    }

    //remove item from cart
    public function destroy($row_id) {
        Cart::remove($row_id);

        return redirect()->route('cart.index')->with('success', __('cart.deleted-from-cart'));
    }

    //update the cart quantity
    public function update($row_id, Request $request) {

        $qty = $request->qty;
        Cart::update($row_id, $qty);
        return redirect()->route('cart.index')->with('success', __('cart.updated-product-qty'));
    }
}
