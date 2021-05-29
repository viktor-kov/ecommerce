<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductComparison;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ComparisonController extends Controller
{
    public function showComparison(ProductService $productService) {
        if(! session('comparison.comparison_id')) {
            abort(404);
        }

        $comparedProducts = [];

        if(session('comparison.products.product_1')) {
            $product = Product::find(session('comparison.products.product_1'));
            $productOneSpecifications = $productService->showProductSpecifications($product->category, $product->id);

            $productOne['productOne']['product']  = $product;
            $productOne['productOne']['specificationsView'] = $productOneSpecifications['product_view'];
            $productOne['productOne']['specifications'] = $productOneSpecifications['product_spect'];

            $comparedProducts = array_merge($comparedProducts, $productOne);
        }

        if(session('comparison.products.product_2')) {
            $product = Product::find(session('comparison.products.product_2'));
            $productTwoSpecifications = $productService->showProductSpecifications($product->category, $product->id);

            $productTwo['productTwo']['product'] = $product;
            $productTwo['productTwo']['specificationsView'] = $productTwoSpecifications['product_view'];
            $productTwo['productTwo']['specifications'] = $productTwoSpecifications['product_spect'];

            $comparedProducts = array_merge($comparedProducts, $productTwo);
        }

        return view('comparison.productComparison', compact('comparedProducts'));
    }

    public function addToComparison(Request $request) {
        if( ! session('comparison.comparison_id')) {
            $comparisonID = rand(10, 99) . time();

            session(['comparison.comparison_id' => $comparisonID]);

            ProductComparison::create([
                'comparison_id' => $comparisonID,
            ]);
        }

        if(session('comparison.comparison_id') && ! session('comparison.products.product_1')) {

            session(['comparison.products.product_1' => $request->product_id]);

            ProductComparison::where('comparison_id', session('comparison.comparison_id'))->update([
                'product_1' => $request->product_id,
            ]);

            return redirect()->route('comparison.show');
        }

        if(session('comparison.comparison_id') && ! session('comparison.products.product_2')) {

            session(['comparison.products.product_2' => $request->product_id]);

            ProductComparison::where('comparison_id', session('comparison.comparison_id'))->update([
                'product_2' => $request->product_id,
            ]);

            return redirect()->route('comparison.show');
        }

        return redirect()->route('comparison.show');
    }

    public function deleteFromComparison($product_field) {
        session()->forget('comparison.products.' . $product_field);

        return back();
    }
}
