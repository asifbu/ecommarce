<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
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
           
});

Route::get('/home',[HomeController::class,'index']);

Route::post('/test',[HomeController::class,'test']);
Route::get('/cart/{id}',[CartController::class,'add_product']);
