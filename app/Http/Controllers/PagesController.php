<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Category;
use App\Models\UserAction;
use App\Models\Informations;
use App\Models\StorageProduct;
use App\Services\AdminServices;
use App\Services\ProductService;
use App\Models\EmailSubscription;


class PagesController extends Controller
{
    public function home() {
        return view('guest.home', [
            'title' => 'Domov',
            'categories' => Category::get(),
        ]);
    }

    public function contact() {
        return view('guest.contact');
    }

    public function whyus() {
        return view('guest.whyus');
    }

    public function delivery() {
        return view('guest.delivery');
    }

    public function career() {
        return view('guest.career');
    }

    public function productsShow($id, $slug = null) {
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
            //but when we dont have 4 random products, we will choose all products (with different slug) 
            //which are avaliable or return empty array
            try {
                $featured_products = Product::where('category', $product_category)->where('slug', '!=', $slug)->get()->random(4);
            } catch(\Exception $e) {
                try {
                    $featured_products = Product::where('slug', '!=', $slug)->get()->random(4);
                } catch(\Exception $e) {
                    $featured_products = Product::where('slug', '!=', $slug)->get() ?: [];
                }
            }

            //get all reviews belongs to the product
            //joing them on users table by review user id and users id
            $reviews = Review::where('product_id', $product_id)
                ->join('users', 'reviews.user_id', '=', 'users.id')
                ->select('reviews.text', 'reviews.id', 'reviews.created_at', 'users.name')
                ->get();
            
            //product amount
            $amount = $product->amount;
            
            return view('guest.singleProduct', [
                'reviews' => $reviews,
                'showed_product' => $product,
                'amount' => $amount->product_amount ?? 0, //if in some case cant get product amount, return 0 product amount
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

    public function userProfile() {   
        return view('guest.profile', [
            'informations' => Informations::where('user_id', auth()->user()->id)->first(),
            'invoices' => Invoice::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function adminPanel() {
        //deleting all records older than 8 days
        UserAction::whereDate('created_at', '<', today()->subDays(7)->toDateString())->delete();

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

    public function showAllUsers($id = null) {
        if($id) {
            return view('admin.userProfileAdmin', [
                'user' => User::where('id', $id)->first()
            ]);
        }
        else {
            return view('admin.allUsers', [
                'users' => User::where('id', '!=', auth()->id())->paginate(14),
            ]);
        }
    }

    public function newProduct() {
        return view('admin.newProduct');
    }

    public function productsAdminShow($slug = null) {
        if($slug) {
            return view('guest.singleProduct', [
                'product' => Product::where('slug', $slug)->first(),
            ]);
        }
        $products = Product::paginate(8);
        return view('admin.allProductsAdmin', [
            'products' => $products,
            'category_name' => 'Všetky produkty'
        ]);
    }

    public function editProduct($id) {
        //select product by slug from db
        $product = Product::where('id', $id)->first();
        //get the product id
        $product_id = $product->id;
        //get the product category
        $product_category = $product->category;

        return view('admin.editProduct', [
            'product' => $product,
            'product_id' => $product_id,
            'product_category' => $product_category,
        ]);

    }
    
    public function thankyou() {
        return view('guest.thankyou');
    }

    public function ordersShow() {
        return view('admin.orders', [
            'orders' => Invoice::orderBy('created_at', 'DESC')->where('active', 1)->get(),
        ]);
    }

    //return all products in storage
    public function productsStorage() {

        $productsInStorage = StorageProduct::paginate(10);
        
        return view('admin.storage', ['products' => $productsInStorage]);
    }
}
