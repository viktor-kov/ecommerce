<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Informations;
use App\Models\Subscriptions;
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
                'featured_products' => Product::select()->where('category', $id)->where('slug', '!=', $slug)->limit(4)->get(),
            ]);
        }
        return view('products', [
            'id' => $id,
            'products' => Product::all()->where('category', $id),
            'category_name' => Category::where('id', $id)->first(),
        ]);
    }

    public function profile() {   
        return view('profile', ['informations' => Informations::where('user_id', auth()->user()->id)->latest()->first()]);
    }

    public function admin() {
        return view('admin', [
            'users' => User::get()->count(),
            'products' => Product::get()->count(),
            'subscriptions' => Subscriptions::get()->count()
        ]);
    }

    public function all_users($id = null) {
        if($id) {
            return view('userprofile', [
                'user' => User::where('id', $id)->first()
            ]);
        }
        else {
            return view('all_users', [
                'users' => User::all()
            ]);
        }
    }

    public function new_product() {
        return view('new_product');
    }

    public function all_products($slug = null) {
        if($slug) {
            return view('product-id', [
                'product' => Product::where('slug', $slug)->first(),
            ]);
        }
        return view('all_products', [
            'products' => Product::all(),
            'category_name' => 'Všetky produkty'
        ]);
    }

    public function edit_product($id) {
        return view('edit_product', [
            'product' => Product::where('id', $id)->first(),
        ]);
    }
}
