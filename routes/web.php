<?php

use App\Models\User;
use App\Models\Information;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\UserAvatarController;
use App\Http\Controllers\InformationsController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [PagesController::class, 'home']);

Route::get('/products/{id}/{slug?}', [PagesController::class, 'products'])->where(['id' => '[0-9]+', 'slug' => '[a-z-0-9]+']);

Route::get('/profile', [PagesController::class, 'profile'])->name('profile.show');

Route::get('/admin', [PagesController::class, 'admin'])->middleware('admin')->name('adminpanel');

Route::get('/allusers/{id?}', [PagesController::class, 'all_users'])->where(['id' => '[0-9]+'])->middleware('admin')->name('allusers');

Route::get('/allproducts/{slug?}', [PagesController::class, 'all_products'])->where(['slug' => '[a-z-0-9]+'])->middleware('admin')->name('allproducts');;

Route::get('/newproduct', [PagesController::class, 'new_product'])->middleware('admin')->name('newproduct');

Route::post('/addproduct', [ProductController::class, 'store'])->middleware('admin')->name('addproduct');

Route::get('/edit/{id?}', [PagesController::class, 'edit_product'])->middleware('admin')->name('editproduct');

Route::post('/editproduct/{id}', [ProductController::class, 'update'])->middleware('admin')->name('updateproduct');

Route::post('/delete/{id}', [ProductController::class, 'delete'])->middleware('admin')->name('deleteproduct');

Route::post('/userupdate/{id}', [UserRoleController::class, 'update'])->where(['id' => '[0-9]+'])->middleware('admin')->name('userupdate');

Route::post('/informations_update', [InformationsController::class, 'store']);

Route::post('/avatar_update', [UserAvatarController::class, 'update']);

Route::post('/subscribe', [SubscribeController::class, 'store'])->name('subscribe.update');

Route::middleware(['auth:sanctum', 'verified'])->get('/profile', [PagesController::class, 'profile'])->name('profile');
