<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StorageProduct;

class ProductStorageController extends Controller
{   
    //update product amount
    public function updateProductAmount(Request $request, $product_id) {

        //find or fail by product id
        $product_amount = StorageProduct::where('product_id', $product_id)->firstOrFail();

        //supdate the amount
        $product_amount->update([
            'product_amount' => $request->product_amount,
        ]);
        
        //return
        return back();
    }
}
