<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;


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

Route::get('/', function () {
    return view('welcome');
});

// Admin Dashboard Route

Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Auth::routes();

//FRONT-END ROUTES

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); // HOMEPAGE
Route::get('/{page}', [FrontendController::class, 'index'])->where('page', 'apparel|furniture|toys|bedding|bathing|gear'); //PAGES



