<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
// Route::match(['get', 'post'], '/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'products'],function(){
//products
Route::get('products/category{id}', [App\Http\Controllers\Products\ProductsController::class, 'singleCategory'])->name('single.category');
Route::get('products/single-product{id}', [App\Http\Controllers\Products\ProductsController::class, 'singleProduct'])->name('single.product');
Route::get('products/shop', [App\Http\Controllers\Products\ProductsController::class, 'shop'])->name('products.shop');


//cart
Route::post('products/add-cart', [App\Http\Controllers\Products\ProductsController::class, 'addToCart'])->name('products.add.cart');
Route::get('products/cart', [App\Http\Controllers\Products\ProductsController::class, 'cart'])->name('products.cart');
Route::get('products/delete-cart/{id}', [App\Http\Controllers\Products\ProductsController::class, 'deleteFromCart'])->name('products.cart.delete');

//checkout products.pay
Route::post('products/prepare-checkout', [App\Http\Controllers\Products\ProductsController::class, 'prepareCheckout'])->name('products.prepare.checkout');
Route::get('products/checkout', [App\Http\Controllers\Products\ProductsController::class, 'checkout'])->name('products.checkout');
Route::post('products/checkout', [App\Http\Controllers\Products\ProductsController::class, 'proccessCheckout'])->name('products.proccess.checkout');
Route::get('products/pay', [App\Http\Controllers\Products\ProductsController::class, 'payWithPaypal'])->name('products.pay');
Route::get('products/success', [App\Http\Controllers\Products\ProductsController::class, 'success'])->name('products.success');

});


//users
// Route::get('users/my-orders', [App\Http\Controllers\Users\UsersController::class, 'myOrders'])->name('users.orders');
Route::get('users/my-orders', [App\Http\Controllers\Users\UsersController::class, 'myOrders'])->name('users.orders')->middleware('auth:web');
Route::get('users/settings', [App\Http\Controllers\Users\UsersController::class, 'settings'])->name('users.settings')->middleware('auth:web');
Route::post('users/settings/{id}', [App\Http\Controllers\Users\UsersController::class, 'updateUserSettings'])->name('users.settings.update')->middleware('auth:web');


//admin panel
Route::get('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'viewLogin'])->name('view.login');
Route::post('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'checkLogin'])->name('check.login');
Route::get('admin/index', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');


