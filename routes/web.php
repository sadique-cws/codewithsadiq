<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Home;
use App\Models\Category;
use App\Models\Course;

Route::get('/', function () {
    return view('public/homepage',["category"=>Category::all(),"course"=>Course::all()]);
})->name('homepage');

Route::get('/c/{slug}',[Home::class,"singleCourse"])->name("singleCourse");
Route::get('/add-to-cart/{slug}',[Home::class,"addToCart"])->name("addToCart");
Route::get('/remove-from-cart/{slug}',[Home::class,"removeFromCart"])->name("removeFromCart");
Route::get('/cart',[Home::class,"cart"])->name("cart");


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin/dashboard',["category"=>Category::all()]);
    });
    Route::post('/add-category',[Admin::class,"addCategory"])->name("addCategory");
    Route::post('/add-course',[Admin::class,"addCourse"])->name("addCourse");
});