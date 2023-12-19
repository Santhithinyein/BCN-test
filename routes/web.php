<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

use App\Models\Product;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Auth;

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
    return view('home',[
        'randomProducts' => Product::inRandomOrder()->take(3)->get()
]);
});



Route::get('/abstract', function () {
    return view('abstract');
});

Route::get('/about',function(){
    return view('about');
});

Route::get('/menu',function(){
    return view('menu');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/product',[ProductController::class,'index']); 
Route::post('/products/{product}',[CartController::class,'addToCart']);
Route::get('/view',[CartController::class,'viewCart']);
Route::delete('/remove/{product}',[CartController::class,'removeFromCart']);
Route::get('/cart/{product}/edit',[CartController::class,'edit']);
Route::put('/cart/{product}/update',[CartController::class,'update']);
Route::post('/product/confirm-order', [OrderController::class,'comfirm']);




