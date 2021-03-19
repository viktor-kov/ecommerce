<?php

namespace App\Http\Controllers;

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
    //showing the specifivations for adding the product by choosed category
    public function show($id, $product_id = null) {

        //geeting the specifications for choosed category and if exist some specifications, we will push them to the specification, if not, we will push empty
        switch($id) {
            case 1:
                $product_specifications = ($product_id) ? MemorySpecification::where('product_id', $product_id)->first() : "";

                return view('new-product-specifications.ram', [
                    'product_specifications' => $product_specifications,
                ]);
            case 2:
                $product_specifications = ($product_id) ? CpuSpecification::where('product_id', $product_id)->first() : "";

                return view('new-product-specifications.cpu', [
                    'product_specifications' => $product_specifications,
                ]);
            case 3:
                $product_specifications = ($product_id) ? MotherboardSpecification::where('product_id', $product_id)->first() : "";
                
                return view('new-product-specifications.motherboard', [
                    'product_specifications' => $product_specifications,
                ]);
            case 4:
                $product_specifications = ($product_id) ? CaseSpecification::where('product_id', $product_id)->first() : "";
               
                return view('new-product-specifications.case', [
                    'product_specifications' => $product_specifications,
                ]);
            case 5:
                $product_specifications = ($product_id) ? SupplySpecification::where('product_id', $product_id)->first() : "";
               
                return view('new-product-specifications.supply', [
                    'product_specifications' => $product_specifications,
                ]);
            case 6:
                $product_specifications = ($product_id) ? DiskSpecification::where('product_id', $product_id)->first() : "";
                
                return view('new-product-specifications.disk', [
                    'product_specifications' => $product_specifications,
                ]);
            case 7:
                $product_specifications = ($product_id) ? CoolingSpecification::where('product_id', $product_id)->first() : "";
                
                return view('new-product-specifications.cooling', [
                    'product_specifications' => $product_specifications,
                ]);
            case 8:
                $product_specifications = ($product_id) ? GpuSpecification::where('product_id', $product_id)->first() : "";
               
                return view('new-product-specifications.gpu', [
                    'product_specifications' => $product_specifications,
                ]);
            default: 
                    abort(404);
                    break;
        }
    }
}
