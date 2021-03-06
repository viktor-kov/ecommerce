<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CpuSpecification;
use App\Models\GpuSpecification;
use App\Models\CaseSpecification;
use App\Models\DiskSpecification;
use App\Models\MemorySpecification;
use App\Models\SupplySpecification;
use App\Models\CoolingSpecification;
use App\Models\MotherboardSpecification;

class SpecificationController extends Controller
{
    public function show($id, $product_id = null) {
        switch($id) {
            case 1:
                if($product_id) {
                    $product_specifications = MemorySpecification::where('product_id', $product_id)->first();
                }
                else {
                    $product_specifications = "";
                }
                return view('products.ram', [
                    'product_specifications' => $product_specifications,
                ]);
            case 2:
                if($product_id) {
                    $product_specifications = CpuSpecification::where('product_id', $product_id)->first();
                }
                else {
                    $product_specifications = "";
                }

                return view('products.cpu', [
                    'product_specifications' => $product_specifications,
                ]);
            case 3:
                if($product_id) {
                    $product_specifications = MotherboardSpecification::where('product_id', $product_id)->first();
                }
                else {
                    $product_specifications = "";
                }
                
                return view('products.motherboard', [
                    'product_specifications' => $product_specifications,
                ]);
            case 4:
                if($product_id) {
                    $product_specifications = CaseSpecification::where('product_id', $product_id)->first();
                }
                else {
                    $product_specifications = "";
                }
                return view('products.case', [
                    'product_specifications' => $product_specifications,
                ]);
            case 5:
                if($product_id) {
                    $product_specifications = SupplySpecification::where('product_id', $product_id)->first();
                }
                else {
                    $product_specifications = "";
                }
                return view('products.supply', [
                    'product_specifications' => $product_specifications,
                ]);
            case 6:
                if($product_id) {
                    $product_specifications = DiskSpecification::where('product_id', $product_id)->first();
                }
                else {
                    $product_specifications = "";
                }
                return view('products.disk', [
                    'product_specifications' => $product_specifications,
                ]);
            case 7:
                if($product_id) {
                    $product_specifications = CoolingSpecification::where('product_id', $product_id)->first();
                }
                else {
                    $product_specifications = "";
                }
                return view('products.cooling', [
                    'product_specifications' => $product_specifications,
                ]);
            case 8:
                if($product_id) {
                    $product_specifications = GpuSpecification::where('product_id', $product_id)->first();
                }
                else {
                    $product_specifications = "";
                }
                return view('products.gpu', [
                    'product_specifications' => $product_specifications,
                ]);
        }
    }
}
