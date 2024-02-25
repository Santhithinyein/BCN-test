<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\MustBeAdminUser;
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



Route::get('/service',function(){
    return view('service');
});
Route::get('/menu',function(){
    return view('menu');
});

Route::get('/menu2',function(){
    return view('menu2');
});
Route::get('/menu3',function(){
    return view('menu3');
});
Route::get('/menu4',function(){
    return view('menu4');
});
Route::get('/menu5',function(){
    return view('menu5');
});
Route::get('/menu6',function(){
    return view('menu6');
});
Route::get('/menu7',function(){
    return view('menu7');
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

Route::middleware(MustBeAdminUser::class)->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/products/create', [AdminController::class, 'create']);
    Route::post('/admin/products/store', [AdminController::class, 'store']);
    Route::get('/admin/products/{product}/edit', [AdminController::class, 'edit']);
    Route::put('/admin/products/{product}/update', [AdminController::class, 'update']);
    Route::delete('/admin/products/{product}/destroy', [AdminController::class, 'destroy']);
});



Route::get('/pdf', [PdfController::class, 'index']);
Route::get('/pdf/{filename}', [PdfController::class, 'show'])->name('pdf.show');





