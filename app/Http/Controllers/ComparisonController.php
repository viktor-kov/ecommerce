<?php

namespace App\Http\Controllers;

use App\Models\ProductComparison;
use Illuminate\Http\Request;

class ComparisonController extends Controller
{
    public function showComparison() {
        
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
    }
}
