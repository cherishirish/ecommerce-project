<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PagesController;

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

Auth::routes();

//FRONT-END ROUTES
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); // HOMEPAGE
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); // HOMEPAGE
Route::get('/about', [App\Http\Controllers\PagesController::class, 'about'])->name('about'); // ABOUT
Route::get('/contact', [App\Http\Controllers\PagesController::class, 'contact'])->name('contact'); // CONTACT
Route::get('/{page}', [FrontendController::class, 'index'])->where('page', 'apparel|furniture|toys|bedding|bathing|gear'); //PAGES



