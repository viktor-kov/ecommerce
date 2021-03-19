<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Review;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Category;
use App\Models\UserAction;
use App\Models\Informations;
use Illuminate\Http\Request;
use App\Models\Subscriptions;
use App\Services\AdminServices;
use App\Models\CpuSpecification;
use App\Models\GpuSpecification;
use App\Services\ProductService;
use App\Models\CaseSpecification;
use App\Models\DiskSpecification;
use App\Models\EmailSubscription;
use App\Models\MemorySpecification;
use App\Models\SupplySpecification;
use App\Models\CoolingSpecification;
use App\Models\MotherboardSpecification;

class PagesController extends Controller
{
    public function home() {
        return view('guest.home', [
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
            $product = Product::where('slug', $slug)->firstOrFail();
            //get the product id
            $product_id = $product->id;
            //get the product category
            $product_category = $product->category;

            $product_specifications = new ProductService;
            
            //getting the product specifications = the return is array of product spec and spec view.
            $product_specifications = $product_specifications->showProductSpecifications($product_category, $product_id);
            
            //trying to get random 4 products from the current product category, but when there is an error, 
            //we will choose 4 random products from all of the products
            try {
                $featured_products = Product::where('category', $product_category)->where('slug', '!=', $slug)->get()->random(4);
            } catch(\Exception $e) {
                $featured_products = Product::where('slug', '!=', $slug)->get()->random(4);
            }

            //get all reviews belongs to the product
            //joing them on users table by review user id and users id
            $reviews = Review::where('product_id', $product_id)
                ->join('users', 'reviews.user_id', '=', 'users.id')
                ->select('reviews.text', 'reviews.id', 'reviews.created_at', 'users.name')
                ->get();

            return view('guest.product-id', [
                'reviews' => $reviews,
                'showed_product' => $product,
                'product_specifications' => $product_specifications['product_spect'],
                'specification_view' => $product_specifications['product_view'],
                'featured_products' => $featured_products,
            ]);
        }
        return view('guest.products', [
            'id' => $id,
            'products' => Product::all()->where('category', $id),
            'category_name' => Category::where('id', $id)->first(),
        ]);
    }

    public function profile() {   
        return view('guest.profile', [
            'informations' => Informations::where('user_id', auth()->user()->id)->first(),
            'invoices' => Invoice::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function admin() {
        //deleting all records older than 8 days
        UserAction::whereDay('created_at', '<', today()->subDays(7))->delete();

        $user_actions = new AdminServices;

        //getting the user actions - getting back array of days and actions per day
        $user_actions = $user_actions->showUserActions();

        return view('admin.admin', [
            'days' => $user_actions['action_days'],
            'actions' => $user_actions['user_actions'],
            'users' => User::get()->count(),
            'products' => Product::get()->count(),
            'subscriptions' => EmailSubscription::get()->count()
        ]);
    }

    public function all_users($id = null) {
        if($id) {
            return view('admin.userprofile', [
                'user' => User::where('id', $id)->first()
            ]);
        }
        else {
            return view('admin.all_users', [
                'users' => User::all()
            ]);
        }
    }

    public function new_product() {
        return view('admin.new_product');
    }

    public function all_products($slug = null) {
        if($slug) {
            return view('guest.product-id', [
                'product' => Product::where('slug', $slug)->first(),
            ]);
        }
        return view('admin.all_products', [
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

        return view('admin.edit_product', [
            'product' => $product,
            'product_id' => $product_id,
            'product_category' => $product_category,
        ]);

    }
    
    public function thankyou() {
        return view('guest.thankyou');
    }

    public function orders() {
        return view('admin.orders', [
            'orders' => Invoice::all()->where('active', 1),
        ]);
    }
}
