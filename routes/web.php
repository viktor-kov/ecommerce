<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ComparisonController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
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
use App\Http\Controllers\SpecificationController;
use App\Http\Controllers\ProductStorageController;

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
Route::get('/profile', [PagesController::class, 'userProfile'])->name('profile.show');
Route::get('/admin', [PagesController::class, 'adminPanel'])->middleware(['auth', 'admin'])->name('adminpanel');
Route::get('/products/{id}/{slug?}', [PagesController::class, 'productsShow'])->where(['id' => '[0-9]+', 'slug' => '[a-z-0-9]+'])->name('product.show');

//product routes
Route::get('/products/show/{slug?}', [PagesController::class, 'productsAdminShow'])->where(['slug' => '[a-z-0-9]+'])->middleware(['auth', 'admin'])->name('allproducts');;
Route::get('/product/new', [PagesController::class, 'newProduct'])->middleware(['auth', 'admin'])->name('newproduct');
Route::post('/product/add', [ProductController::class, 'productStore'])->middleware(['auth', 'admin'])->name('addproduct');
Route::get('/product/edit/{id?}', [PagesController::class, 'editProduct'])->middleware(['auth', 'admin'])->name('editproduct');
Route::put('/product/edit/{id}', [ProductController::class, 'productUpdate'])->middleware(['auth', 'admin'])->name('updateproduct');
Route::delete('/product/delete/{id}', [ProductController::class, 'productDelete'])->middleware(['auth', 'admin'])->name('deleteproduct');



//user info routes
Route::put('/user/role/{id}', [UserRoleController::class, 'updateUserRole'])->where(['id' => '[0-9]+'])->middleware(['auth', 'admin'])->name('userupdate');
Route::get('/users/show/{id?}', [PagesController::class, 'showAllUsers'])->where(['id' => '[0-9]+'])->middleware(['auth', 'admin'])->name('allusers');
Route::put('/user/informations', [InformationsController::class, 'informationsUpdate'])->middleware('auth')->name('informations.update');
Route::put('/avatar', [UserAvatarController::class, 'avatarUpdate'])->middleware('auth')->name('avatar.update');

//subscribe route
Route::post('/subscribe', [SubscribeController::class, 'subscribeStore'])->name('subscribe.update');


//cart
Route::get('/cart', [CartController::class, 'cartIndex'])->name('cart.index');
Route::post('/cart', [CartController::class, 'cartStore'])->name('cart.store');
Route::delete('/cart/{row_id}', [CartController::class, 'cartDestroy'])->name('cart.destroy');
Route::put('/cart/{row_id}', [CartController::class, 'cartUpdate'])->name('cart.update');
Route::get('/checkout', [CheckoutController::class, 'checkoutIndex'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'checkoutStore'])->name('checkout.store');
Route::get('/thankyou', [PagesController::class, 'thankyou'])->name('thankyou.index');

//user password update
Route::put('/password', [PasswordController::class, 'passwordUpdate'])->middleware('auth')->name('password.update');

//routes for orders and invoices
Route::get('/order/show/{id}', [OrderController::class, 'showOrderGuest'])->name('orderguest.show');
Route::get('/invoice/show/{id}', [InvoiceController::class, 'invoiceShow'])->name('invoice.show');

Route::get('/orders/show', [PagesController::class, 'ordersShow'])->middleware(['auth', 'admin'])->name('orders');
Route::get('/orders/{category}', [OrderController::class, 'showOrderCategory'])->middleware(['auth', 'admin'])->name('orders.category');
Route::put('/order/{id}/{status}', [InvoiceController::class, 'updateStatus'])->middleware(['auth', 'admin'])->name('order-status.update');
Route::get('/orders/show/{id}', [OrderController::class, 'showOrder'])->middleware(['auth', 'admin'])->name('order.show');
Route::put('/finish/order/{id}', [InvoiceController::class, 'finishOrder'])->middleware(['auth', 'admin'])->name('order.finish');

Route::get('/specifications/{category_id}/{product_id?}', [SpecificationController::class, 'specificationsShow'])->middleware('ajax')->name('spec.show');


//routes for storing reviews, getting and deleting them
Route::post('/review', [ReviewController::class, 'reviewStore'])->middleware('auth')->name('review.store');
Route::get('/reviews/show', [ReviewController::class, 'reviewIndex'])->middleware(['auth', 'admin'])->name('review.index');
Route::delete('/review/{id}', [ReviewController::class, 'reviewDelete'])->middleware(['auth', 'admin'])->name('review.destroy');

//routes for tickets
Route::get('/tickets', [UserTicketController::class, 'ticketsIndex'])->middleware('auth')->name('tickets.index');
Route::get('/tickets/admin', [UserTicketController::class, 'allTickets'])->middleware(['auth', 'admin'])->name('tickets.all');
Route::get('/tickets/new', [UserTicketController::class, 'newTicket'])->middleware('auth')->name('ticket.new');
Route::post('/ticket/save', [UserTicketController::class, 'saveTicket'])->middleware('auth')->name('ticket.save');
Route::get('/ticket/show/{ticket_id}', [UserTicketController::class, 'showTicket'])->middleware('auth')->name('ticket.show');
Route::post('/ticket/{ticket_id}/message', [UserTicketController::class, 'storeTicketMesage'])->middleware('auth')->name('message.store');
Route::put('/ticket/{ticket_id}/status', [UserTicketController::class, 'ticketStatus'])->middleware(['auth', 'admin'])->name('ticket.status');

Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/whyus', [PagesController::class, 'whyus'])->name('whyus');
Route::get('/delivery', [PagesController::class, 'delivery'])->name('delivery');
Route::get('/career', [PagesController::class, 'career'])->name('career');

Route::get('/search', [SearchController::class, 'productSearch'])->name('product.search');

Route::get('/lang/{lang}', [LanguageController::class, 'setLanguage'])->name('lang');

//routes for starage
Route::get('/storage', [PagesController::class, 'productsStorage'])->middleware(['auth', 'admin'])->name('products.storage');
Route::put('/storage/update/{product_id}', [ProductStorageController::class, 'updateProductAmount'])->middleware(['auth', 'admin'])->name('productamount.update');

Route::middleware(['auth:sanctum', 'verified'])->get('/profile', [PagesController::class, 'userProfile'])->name('profile');

//fallback route
Route::fallback(function () {
    abort(403);
});


Route::get('/comparison', [ComparisonController::class, 'showComparison'])->name('comparison.show');
Route::post('/comparison', [ComparisonController::class, 'addToComparison'])->name('comparison.store');
Route::delete('/comparison/{product_field}', [ComparisonController::class, 'deleteFromComparison'])->name('comparison.delete');

Route::get('/gdpr', [PagesController::class, 'showGDPR'])->name('show.gdpr');
Route::get('/businessconditions', [PagesController::class, 'showBusinessConditions'])->name('show.businessConditions');

