<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductDeleteRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function store(ProductStoreRequest $request) {

        dd($request->all());

        $new_product = new Product;

        $product_name = $request->product_name;
        $product_slug = Str::slug($product_name, '-');
        $product_without_dph = ($request->product_price) * 0.80;

        $extension = $request->file('product_image')->extension();
        $photo_name = $product_slug.'.'.$extension;
        $photo_path = $request->file('product_image')->storeAs('products', $photo_name, 'public');

        $new_product->name = $product_name; 
        $new_product->text = $request->product_description;
        $new_product->slug =  $product_slug;
        $new_product->category = $request->product_category;
        $new_product->price = $request->product_price;
        $new_product->without_dph = $product_without_dph;
        $new_product->photo_path = $photo_path;

        $new_product->save();
    

        return redirect()->route('product.show', ['id' => $request->product_category, 'slug' => $product_slug]);
    }

    public function update(ProductUpdateRequest $request) {
        $product_name = $request->product_name;
        $product_without_dph = ($request->product_price) * 0.80;

        $product_slug = Str::slug($product_name, '-');
        
        if($request->file('product_image')) {
            $photo_path = $request->product_photo_path;
            $delete_product_photo = Storage::disk('public')->delete($photo_path);

            $extension = $request->file('product_image')->extension();
            $photo_name = $product_slug.'.'.$extension;
            $photo_path = $request->file('product_image')->storeAs('products', $photo_name, 'public');
        }
        else {
            $photo_path = $request->product_photo_path;
        }

        $id = $request->id;
        $product_text = $request->product_description;
        $product_price = $request->product_price;
        $product_category = $request->product_category;
        $product_photo_path = $photo_path;

        $update_product = Product::where('id', $id)->update([
            'name' => $product_name, 
            'text' => $product_text,
            'slug' => $product_slug,
            'category' => $product_category,
            'price' => $product_price,
            'without_dph' => $product_without_dph,
            'photo_path' => $product_photo_path,
        ]);

        return redirect()->route('product.show', ['id' => $product_category, 'slug' => $product_slug]);
    }

    public function delete(ProductDeleteRequest $request) {

        $id = $request->id;
        $photo_path = $request->product_photo_path;
        
        $delete_product = Product::where('id', $id)->delete();

        $delete_product_photo = Storage::disk('public')->delete($photo_path);

        return redirect('allproducts');
    }
}
