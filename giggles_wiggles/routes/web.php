<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\TaxRateController;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProduct;


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

//FRONT-END ROUTES

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('home'); // HOMEPAGE
Route::get('/home', [App\Http\Controllers\PageController::class, 'index'])->name('home'); // HOMEPAGE
Route::get('/product', [ProductController::class, 'index'])->name('product.index'); // PRODUCTPAGE
Route::get('/product/search', [ProductController::class, 'search'])->name('product.search');
Route::get('/product/{id}', [ProductController:: class, 'show'])->name('product.show'); // DETAILED PAGE
Route::get('/profile', [PageController:: class, 'profile'])->name('page.profile'); // PROFILE PAGE
Route::get('/about', [PageController:: class, 'about'])->name('page.about'); // ABOUT PAGE
Route::get('/contact', [PageController:: class, 'contact'])->name('page.contact'); // CONTACT PAGE
Route::post('/contact', [PageController:: class, 'store'])->name('page.contact.submit'); // CONTACT PAGE SUBMIT
Route::get('/contact/success', [PageController::class, 'success'])->name('page.contact.success');
Route::get('/registry', [PageController:: class, 'registry'])->name('page.registry'); // REGISTRY PAGE

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add'); //ADD TO CART
Route::get('/cart/show', [CartController::class, 'showCart'])->name('cart.show'); //SHOWCART
Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear'); //CLEARCART

Route::get('/checkout', [CheckoutController::class, 'index'])->middleware('auth')->name('checkout.index');
Route::post('/checkout/order', [CheckoutController::class, 'store'])->name('checkout.order')->middleware('auth');
Route::get('/checkout/order/email', [CheckoutController::class, 'htmlmail'])->name('checkout.email');
Route::get('/order/confirmation', [CheckoutController::class, 'orderConfirm'])->name('order.confirmation');


// SUBSCRIBE TO NEWSLETTER

Route::post('home/subscribe', [SubscriberController::class, 'store'])->name('home.subscribe');













// Admin Dashboard Route

Route::get('admin/dashboard', [AdminController::class, 'index'])
->name('admin.dashboard')->middleware('auth', 'is_admin');


// Admin Users CRUD

Route::get('admin/users', [UserController::class, 'index'])
->name('admin.users')->middleware('auth', 'is_admin');

Route::get('admin/users/edit/{id}', [UserController::class, 'edit'])
->name('admin.users.edit')->middleware('auth', 'is_admin');

Route::put('admin/users/update', [UserController::class, 'update'])
->name('admin.users.update')->middleware('auth', 'is_admin');

Route::delete('admin/users/delete/{id}', [UserController::class, 'destroy'])
->name('admin.users.delete')->middleware('auth', 'is_admin');

Route::get('admin/users/create', [UserController::class, 'create'])
->name('admin.users.create')->middleware('auth', 'is_admin');

Route::post('admin/users/store', [UserController::class, 'store'])
->name('admin.users.store')->middleware('auth', 'is_admin');




// Admin Categories CRUD

Route::get('admin/categories', [CategoryController::class, 'index'])
->name('admin.categories')->middleware('auth', 'is_admin');
Route::get('admin/categories/create', [CategoryController::class, 'create'])
->name('admin.categories.create')->middleware('auth', 'is_admin');
Route::get('admin/categories/edit/{id}', [CategoryController::class, 'edit'])
->name('admin.categories.edit')->middleware('auth', 'is_admin');
Route::delete('admin/categories/delete/{id}', [CategoryController::class, 'destroy'])
->name('admin.categories.delete')->middleware('auth', 'is_admin');
Route::put('admin/categories/update', [CategoryController::class, 'update'])
->name('admin.categories.update')->middleware('auth', 'is_admin');
Route::post('admin/categories/store', [CategoryController::class, 'store'])
->name('admin.categories.store')->middleware('auth', 'is_admin');

// Admin Brands CRUD

Route::get('admin/brands', [AdminBrandController::class, 'index'])
->name('admin.brands')->middleware('auth', 'is_admin');
Route::get('admin/brands/create', [AdminBrandController::class, 'create'])
->name('admin.brands.create')->middleware('auth', 'is_admin');
Route::get('admin/brands/edit/{id}', [AdminBrandController::class, 'edit'])
->name('admin.brands.edit')->middleware('auth', 'is_admin');
Route::delete('admin/brands/delete/{id}', [AdminBrandController::class, 'destroy'])
->name('admin.brands.delete')->middleware('auth', 'is_admin');
Route::put('admin/brands/update', [AdminBrandController::class, 'update'])
->name('admin.brands.update')->middleware('auth', 'is_admin');
Route::post('admin/brands/store', [AdminBrandController::class, 'store'])
->name('admin.brands.store')->middleware('auth', 'is_admin');

// Admin Orders CRUD

Route::get('admin/orders', [AdminOrderController::class, 'index'])
->name('admin.orders')->middleware('auth', 'is_admin');
Route::get('admin/orders/edit/{id}', [AdminOrderController::class, 'edit'])
->name('admin.orders.edit')->middleware('auth', 'is_admin');
Route::put('admin/orders/update', [AdminOrderController::class, 'update'])
->name('admin.orders.update')->middleware('auth', 'is_admin');
Route::delete('admin/orders/delete/{id}', [AdminOrderController::class, 'destroy'])
->name('admin.orders.delete')->middleware('auth', 'is_admin');

// Admin TaxRates CRUD

Route::get('admin/tax-rates', [TaxRateController::class, 'index'])
->name('admin.tax-rates')->middleware('auth', 'is_admin');
Route::get('admin/tax-rates/edit/{id}', [TaxRateController::class, 'edit'])
->name('admin.tax-rates.edit')->middleware('auth', 'is_admin');
Route::put('admin/tax-rates/update', [TaxRateController::class, 'update'])
->name('admin.tax-rates.update')->middleware('auth', 'is_admin');



// Admin Product CRUD

// List view
Route::get('admin/products', [AdminProduct::class, 'index'])
  ->name('admin.products')->middleware('auth','is_admin');

// // Add new record
Route::get('admin/products/create', [AdminProduct::class, 'create'])
    ->name('product.create')->middleware('auth','is_admin');
Route::post('admin/products/store', [AdminProduct::class, 'store'])
    ->name('product.store')->middleware('auth','is_admin');

// Edit record
Route::get('admin/products/edit/{id}', [AdminProduct::class, 'edit'])
    ->name('product.edit')->middleware('auth','is_admin');
Route::put('admin/products/{id}', [AdminProduct::class, 'update'])
    ->name('product.update')->middleware('auth','is_admin');

//Delete
Route::delete('/admin/products/delete/{id}', [AdminProduct::class, 'destroy'])
    ->name('product.destroy')->middleware('auth', 'is_admin');

//Search
Route::get('/admin/products/search', [AdminProduct::class, 'search'])
    ->name('admin.products.search')->middleware('auth', 'is_admin');






