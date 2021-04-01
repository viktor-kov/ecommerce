<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\UserAvatarController;
use App\Http\Controllers\UserTicketController;
use App\Http\Controllers\InformationsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SpecificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//main routes
Route::get('/', [PagesController::class, 'home'])->name('home.index');
Route::get('/profile', [PagesController::class, 'profile'])->name('profile.show');
Route::get('/admin', [PagesController::class, 'admin'])->middleware('admin')->name('adminpanel');
Route::get('/products/{id}/{slug?}', [PagesController::class, 'products'])->where(['id' => '[0-9]+', 'slug' => '[a-z-0-9]+'])->name('product.show');

//product routes
Route::get('/allproducts/{slug?}', [PagesController::class, 'all_products'])->where(['slug' => '[a-z-0-9]+'])->middleware('admin')->name('allproducts');;
Route::get('/newproduct', [PagesController::class, 'new_product'])->middleware('admin')->name('newproduct');
Route::post('/addproduct', [ProductController::class, 'store'])->middleware('admin')->name('addproduct');
Route::get('/edit/{id?}', [PagesController::class, 'edit_product'])->middleware('admin')->name('editproduct');
Route::put('/editproduct/{id}', [ProductController::class, 'update'])->middleware('admin')->name('updateproduct');
Route::delete('/delete/{id}', [ProductController::class, 'delete'])->middleware('admin')->name('deleteproduct');



//user info routes
Route::post('/userupdate/{id}', [UserRoleController::class, 'update'])->where(['id' => '[0-9]+'])->middleware('admin')->name('userupdate');
Route::get('/allusers/{id?}', [PagesController::class, 'all_users'])->where(['id' => '[0-9]+'])->middleware('admin')->name('allusers');
Route::put('/informations_update', [InformationsController::class, 'store'])->middleware('auth')->name('informations.update');
Route::put('/avatar_update', [UserAvatarController::class, 'update'])->middleware('auth')->name('avatar.update');

//subscribe route
Route::post('/subscribe', [SubscribeController::class, 'store'])->name('subscribe.update');


//cart 
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::delete('/cart/{row_id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::put('/cartupdate/{row_id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/thankyou', [PagesController::class, 'thankyou'])->name('thankyou.index');

Route::get('/lang/{lang}', [LanguageController::class, 'setLanguage'])->name('lang');

Route::middleware(['auth:sanctum', 'verified'])->get('/profile', [PagesController::class, 'profile'])->name('profile');

//user password update
Route::post('/updatepassword', [PasswordController::class, 'update'])->middleware('auth')->name('password.update');

Route::fallback(function () {
    abort(403);
});

Route::get('/order/{id}/show', [OrderController::class, 'showOrderGuest'])->name('orderguest.show');
Route::get('/invoice/{id}', [InvoiceController::class, 'show'])->name('invoice.show');

Route::get('/orders', [PagesController::class, 'orders'])->middleware('admin')->name('orders');
Route::get('/orders/{category}', [OrderController::class, 'showOrderCategory'])->middleware('admin')->name('orders.category');
Route::put('/order/{id}/{status}', [InvoiceController::class, 'updateStatus'])->middleware('admin')->name('order-status.update');
Route::get('/orders/{id}/show', [OrderController::class, 'showOrder'])->middleware('admin')->name('order.show');
Route::put('/finish/order/{id}', [InvoiceController::class, 'finishOrder'])->middleware('admin')->name('order.finish');

Route::get('/specifications/{category_id}/{product_id?}', [SpecificationController::class, 'show'])->middleware('ajax')->name('spec.show');


//routes for storing reviews, getting and deleting them
Route::post('/review', [ReviewController::class, 'store'])->middleware('auth')->name('review.store');
Route::get('/review', [ReviewController::class, 'index'])->middleware('admin')->name('review.index');
Route::delete('/review/{id}', [ReviewController::class, 'delete'])->middleware('admin')->name('review.destroy');

Route::get('/tickets', [UserTicketController::class, 'index'])->middleware('auth')->name('tickets.index');
Route::get('/alltickets', [UserTicketController::class, 'allTickets'])->middleware(['auth', 'admin'])->name('tickets.all');
Route::get('/tickets/new', [UserTicketController::class, 'newTicket'])->middleware('auth')->name('ticket.new');
Route::post('/ticket/save', [UserTicketController::class, 'saveTicket'])->middleware('auth')->name('ticket.save');
Route::get('/ticket/{ticket_id}/show', [UserTicketController::class, 'showTicket'])->middleware('auth')->name('ticket.show');
Route::post('/ticket/{ticket_id}/message', [UserTicketController::class, 'storeTicketMesage'])->middleware('auth')->name('message.store');
Route::put('/ticket/{ticket_id}/status', [UserTicketController::class, 'ticketStatus'])->middleware(['auth', 'admin'])->name('ticket.status');

Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/whyus', [PagesController::class, 'whyus'])->name('whyus');
Route::get('/delivery', [PagesController::class, 'delivery'])->name('delivery');
Route::get('/career', [PagesController::class, 'career'])->name('career');

Route::get('/search', [SearchController::class, 'productSearch'])->name('product.search');