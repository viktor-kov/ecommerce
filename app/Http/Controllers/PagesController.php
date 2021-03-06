<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Category;
use App\Models\Informations;
use Illuminate\Http\Request;
use App\Models\Subscriptions;
use App\Models\CpuSpecification;
use App\Models\GpuSpecification;
use App\Models\CaseSpecification;
use App\Models\DiskSpecification;
use App\Models\MemorySpecification;
use App\Models\SupplySpecification;
use App\Models\CoolingSpecification;
use App\Models\EmailSubscription;
use App\Models\MotherboardSpecification;

class PagesController extends Controller
{
    public function home() {
        return view('home', [
            'title' => 'Domov',
            'categories' => Category::get(),
        ]);
    }

    public function contact() {
        return 'kontakt';
    }

    public function products($id, $slug = null) {
        //if slug exist, than return view with product specifications
        if($slug) {
            //select product by slug from db
            $product = Product::where('slug', $slug)->first();
            //get the product id
            $product_id = $product->id;
            //get the product category
            $product_category = $product->category;

            switch($product_category) {
                case 1:
                    $product_specifications = MemorySpecification::where('product_id', $product_id)->first();
                    $specification_view = 'specifications.ram';
                    break;
                case 2:
                    $product_specifications = CpuSpecification::where('product_id', $product_id)->first();
                    $specification_view = 'specifications.cpu';
                    break;
                case 3:
                    $product_specifications = MotherboardSpecification::where('product_id', $product_id)->first();
                    $specification_view = 'specifications.motherboard';
                    break;
                case 4:
                    $product_specifications = CaseSpecification::where('product_id', $product_id)->first();
                    $specification_view = 'specifications.case';
                    break;
                case 5:
                    $product_specifications = SupplySpecification::where('product_id', $product_id)->first();
                    $specification_view = 'specifications.supply';
                    break;
                case 6:
                    $product_specifications = DiskSpecification::where('product_id', $product_id)->first();
                    $specification_view = 'specifications.disk';
                    break;
                case 7:
                    $product_specifications = CoolingSpecification::where('product_id', $product_id)->first();
                    $specification_view = 'specifications.cooling';
                    break;
                case 8:
                    $product_specifications = GpuSpecification::where('product_id', $product_id)->first();
                    $specification_view = 'specifications.gpu';
                    break;
            }

            return view('product-id', [
                'product' => $product,
                'product_specifications' => $product_specifications,
                'specification_view' => $specification_view,
                'featured_products' => Product::select()->where('category', $product_category)->where('slug', '!=', $slug)->limit(4)->get(),
            ]);
        }
        return view('products', [
            'id' => $id,
            'products' => Product::all()->where('category', $id),
            'category_name' => Category::where('id', $id)->first(),
        ]);
    }

    public function profile() {   
        return view('profile', [
            'informations' => Informations::where('user_id', auth()->user()->id)->latest()->first(),
            'invoices' => Invoice::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function admin() {
        return view('admin', [
            'users' => User::get()->count(),
            'products' => Product::get()->count(),
            'subscriptions' => EmailSubscription::get()->count()
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
        //select product by slug from db
        $product = Product::where('id', $id)->first();
        //get the product id
        $product_id = $product->id;
        //get the product category
        $product_category = $product->category;

        switch($product_category) {
            case 1:
                $product_specifications = MemorySpecification::where('product_id', $product_id)->first();
                break;
             case 2:
                $product_specifications = CpuSpecification::where('product_id', $product_id)->first();
                break;
             case 3:
                $product_specifications = MotherboardSpecification::where('product_id', $product_id)->first();
                break;
             case 4:
                $product_specifications = CaseSpecification::where('product_id', $product_id)->first();
                break;
             case 5:
                $product_specifications = SupplySpecification::where('product_id', $product_id)->first();
                break;
             case 6:
                $product_specifications = DiskSpecification::where('product_id', $product_id)->first();
                break;
             case 7:
                $product_specifications = CoolingSpecification::where('product_id', $product_id)->first();
                break;
             case 8:
                $product_specifications = GpuSpecification::where('product_id', $product_id)->first();
                break;
        }

        return view('edit_product', [
            'product' => $product,
            'product_id' => $product_id,
            'product_category' => $product_category,
            'product_specifications' => $product_specifications,
        ]);

    }
    
    public function thankyou() {
        return view('thankyou');
    }

    public function orders() {
        return view('orders', [
            'orders' => Invoice::all()->where('active', 1),
        ]);
    }
}
