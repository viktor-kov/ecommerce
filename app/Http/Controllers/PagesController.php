<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        return view('home', [
            'title' => 'Domov',
        ]);
    }

    public function contact() {
        return 'kontakt';
    }

    public function products($id, $slug = null) {
        if($slug) {
            return view('product-id', [
                'product' => Product::where('slug', $slug)->first(),
            ]);
        }
        return view('products', [
            'id' => $id,
            'products' => Product::all()->where('category', $id),
            'category_name' => Category::where('id', $id)->first(),
        ]);
    }
}
