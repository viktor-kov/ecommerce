<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecificationController extends Controller
{
    public function show($id) {
        switch($id) {
            case 1:
                return view('products.ram');
            case 2:
                return view('products.cpu');
            case 3:
                return view('products.motherboard');
            case 4:
                return view('products.case');
            case 5:
                return view('products.supply');
            case 6:
                return view('products.disk');
            case 7:
                return view('products.cooling');
            case 8:
                return view('products.gpu');
        }
    }
}
