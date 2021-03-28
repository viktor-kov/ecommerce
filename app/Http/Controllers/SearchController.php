<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductSearchRequest;
use App\Models\SearchedItem;

class SearchController extends Controller
{   
    //product search
    public function productSearch(ProductSearchRequest $request) {
        $search_for = $request->search;
        
        SearchedItem::create([
            'searched_for' => $search_for,
        ]);

        $products = Product::where('name', 'like', "%$search_for%")->get();

        return view('guest.searched-products', ['products' => $products]);
    }
}
