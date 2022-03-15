<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\ApproveProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Middleware\OnlyAdmin;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

 Route::get('/',[HomeController::class,'index']);
//Route::get('/',[HomeController::class,'main_index']);

    

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::prefix('/admin')->middleware(['auth',OnlyAdmin::class])->group(function(){

    Route::get('/dashboard',[HomeController::class,'admin']);
    Route::get('/categories',[CategoryController::class,'index']);
    Route::post('/categories/store',[CategoryController::class,'store']);
    Route::get('/categories/{id}/edit',[CategoryController::class,'edit']);
    Route::post('/categories/update/{id}',[CategoryController::class,'update']);
    Route::post('/categories/{id}/delete',[CategoryController::class,'destroy']);

    Route::get('/product',[ProductController::class,'index']);
    Route::post('/product/store',[ProductController::class,'store']);
    Route::get('/product/edit/{id}',[ProductController::class,'edit']);
    Route::put('/product/{id}/update',[ProductController::class,'update']);
    Route::post('/product/delete/{id}',[ProductController::class,'destroy']);

    Route::get('/status/product',[ProductController::class,'status']);
    Route::get('/status/product/edit/{id}',[ProductController::class,'statusEdit']);
    Route::put('/status/product/{id}/update',[ProductController::class,'statusUpdate']);
    Route::get('/display/product',[ProductController::class,'display_product']);

    Route::get('/approve/product',[ApproveProductController::class,'index']);
           
});

//Route::get('/home',[HomeController::class,'index']);
Route::get('/main',[HomeController::class,'main_index']);


Route::post('/test',[HomeController::class,'test']);
Route::get('/cart/{id}',[CartController::class,'add_product']); 
Route::get('/checkout',[CartController::class,'checkout']); 
Route::get('/read',[CartController::class,'read']); 
Route::get('/cart/remove/{id}',[CartController::class,'remove']); 

Route::get('/new', function() {
    return view('layouts/client_view/checkout');
});

// Route::get('/main', function() {
//     return view('layouts/client_view/main_page');
// });
Route::get('/single_product', function() {
    //return view('layouts/client_view/single_product');
    return view('layouts/client_view/cart');
});


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

