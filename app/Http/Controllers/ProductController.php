<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products')->with(['products' => $products]);
    }

    public function show($slug) {
       $product = Product::where('slug', $slug)->get();

       return view('product-id')->with(['products' => $product, 'title' => $slug]);
    }
}
