<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\PaytmController;
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
Route::get('/my-course',[Home::class,"myCourse"])->name("myCourse");
Route::get('/my-payment',[Home::class,"myPayment"])->name("myPayment");

Route::get('/initiate',[PaytmController::class,'initiate'])->name('initiate.payment');
Route::post('/payment',[PaytmController::class,'pay'])->name('make.payment');
Route::post('/payment/status', [PaytmController::class,'paymentCallback'])->name('status');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::prefix('admin')->group(function () {
    Route::get('/', function () {return view('admin/dashboard',["category"=>Category::all()]);})->name('dashboard')->middleware('admin');
    //course work
    Route::get('/course', function () {return view('admin/course',["course"=>Course::all()]);})->name('adminCourse');
    Route::get('/course/add', function () {return view('admin/addCourse',["category"=>Category::all()]);})->name('adminCourseAdd');
    Route::post('course/add-course',[Admin::class,"addCourse"])->name("addCourse");

    
    Route::get('/category', function () {return view('admin/category',["category"=>Category::all()]);})->name('adminCategory');
    Route::post('/add-category',[Admin::class,"addCategory"])->name("addCategory");

});