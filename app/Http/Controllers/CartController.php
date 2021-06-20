<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StorageProduct;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function cartIndex() {

        //trying to get 4 random products
        //if fail, then try to return products
        //if fail then return empty array
        try {
            $products = Product::get()->random(4);
        }
        catch(\Exception $e) {
            try {
                $products = Product::get();
            }
            catch(\Exception $e) {
                $products = [];
            }
        }

        return view('guest.cart', [
            'featured_products' => $products,
        ]);
    }

    //store the product in cart
    public function cartStore(Request $request) {

        //checking for duplicates
        $duplicates = Cart::search(function($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->product_id;
        });

        //if we have some duplicates, we will redirect to cart page
        if($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index');
        }

        $product_id = $request->product_id;
        $product = Product::findOrFail($product_id);
        $product_name = $product->name;
        $product_slug = $product->slug;
        $product_price = $product->price;
        $product_category = $product->getCategory->category_name;

        $product_photo = $product->photo_path;

        Cart::add([
            'id' => $product_id,
            'name' => $product_name,
            'qty' => 1,
            'price' => $product_price,
            'options' => [
                'slug' => $product_slug,
                'category' => $product_category,
                'product_photo' => $product_photo,
            ]
        ])->associate('App\Models\Product');

        return redirect()->route('cart.index')->with('success', __('cart.added-to-cart'));
    }

    //remove item from cart
    public function cartDestroy($row_id) {

        Cart::remove($row_id);

        return redirect()->route('cart.index')->with('success', __('cart.deleted-from-cart'));
    }

    //update the cart quantity
    public function cartUpdate($row_id, Request $request) {

        //wanted amount of product
        $qty = $request->qty;

        //check if this amount is predefined
        if(in_array($qty, [1, 2, 3, 4, 5])) {

            //get the product from cart
            $product_in_cart = Cart::get($row_id);

            //get the product from db
            $product_in_storage = StorageProduct::where('product_id', $product_in_cart->id)->firstOrFail();

            //if our wanted quantity is over than the amount in db, we will show error mesage
            if($qty > $product_in_storage->product_amount) {
                return redirect()->route('cart.index')->with('error', __('cart.not-enought-amount'));
            }

            //update the product quantitny in cart
            Cart::update($row_id, $qty);
            return redirect()->route('cart.index')->with('success', __('cart.updated-product-qty'));
        }

        return back()->with('error', __('other.error'));
    }
}
