<?php

use App\Http\Controllers\admin\categorie\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\header\CarouselController;
use App\Http\Controllers\admin\header\HeaderController;
use App\Http\Controllers\admin\product;
use App\Http\Controllers\admin\product\ProductController;
use App\Http\Controllers\admin\testimonial\TestimonialController;

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


Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('dashboard', DashboardController::class );
    Route::resource('product', ProductController::class )->except('show');
    Route::resource('categorie', CategoryController::class )->except('show');
    Route::resource('testimonial', TestimonialController::class )->except('show');
    Route::resource('header', HeaderController::class )->except('show');
    Route::resource('carousel', CarouselController::class )->except('show');
});
