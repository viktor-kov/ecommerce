<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductDeleteRequest;
use App\Services\ProductService;
use Exception;

class ProductController extends Controller
{   
    //showing all products
    public function index() {
        $products = Product::all();
        return view('guest.products')->with(['products' => $products]);
    }

    public function store(ProductStoreRequest $request) {

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

        $product_id = $new_product->id;

        $save_product = new ProductService;

        //trying to save the product, if we can not save the product specifications, we wil delete the saved product 
        try {
            $save_product->saveProductSpecifications($request, $product_id);
        } catch(Exception $e) {
            $new_product->delete();
            return back();
        }
    
        return redirect()->route('product.show', ['id' => $request->product_category, 'slug' => $product_slug])->with('success', __('products.product-added'));
    }

    //update the product
    public function update(Request $request, ProductService $productService) {

        $product_id = $request->id;

        $edited_product = Product::where('id', $product_id)->get()->first();
        //from product name make slug
        $product_slug = Str::slug($request->product_name, '-');

        $product_photo = $request->product_photo_path;

        //if we uploaded the new product photo
        if($request->file('product_image')) {
           $product_photo = $productService->updateProductPhoto($request, $product_photo, $product_slug);
        }
        
        //update product in main table
        $productService->updateProduct($request, $product_photo);

        //if edited product category is different than the category we want to switch, 
        //than we will delete product specifications from the previous product category
        if($edited_product->category != $request->product_category) {

            //delete old specifications from old product category
            $productService->deleteSpecifications($product_id, $edited_product->category);

        }

        //update new specifications
        $productService->updateProductSpecification($request, $product_id);

        return redirect()->route('product.show', ['id' => $request->product_category, 'slug' => $product_slug])->with('success', __('products.product-updated'));
    }

    public function delete(ProductDeleteRequest $request) {

        $id = $request->id;
        $photo_path = $request->product_photo_path;
        
        $delete_product = Product::where('id', $id)->delete();

        $delete_product_photo = Storage::disk('public')->delete($photo_path);

        return redirect('allproducts')->with('error', __('products.product-deleted'));
    }
}
