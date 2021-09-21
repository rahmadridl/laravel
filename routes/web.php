<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\KerjaController;
use App\Http\Livewire\Members;

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

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', \App\Http\Controllers\UsersController::class);
});

Route::get('products', [ProductController::class, 'index'])->name('products');
Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('/add-to-cart/{product}', [ProductController::class, 'addToCart'])->name('add-cart');
Route::get('/remove/{id}', [ProductController::class,'removeFromCart'])->name('remove');
Route::get('/change-qty/{product}', [ProductController::class,'changeQty'])->name('change_qty');
Route::post('products', [ProductController::class, 'store'])->name('products');
Route::get('create', [ProductController::class, 'create']);
// Route::get('posts/{post}/edit', [ProductController::class, 'edit']);
// Route::put('posts/{post}', [ProductController::class, 'update']);
// Route::delete('posts/{post}', [ProductController::class, 'destroy']);

Route::post('/pay', [PaymentController::class,'pay'])->name('pay');
Route::post('/indipay/response/success', [PaymentController::class,'response'])->name('pay.response');
Route::post('/indipay/response/failure', [PaymentController::class,'response'])->name('pay.response');
Route::get('payment-success', [PaymentController::class,'paymentSuccess'])->name("success.pay");

Route::get('posts', [PostsController::class, 'index'])->name('posts');
Route::post('posts', [PostsController::class, 'store'])->name('posts');
Route::get('posts/create', [PostsController::class, 'create']);
Route::get('posts/{post}/edit', [PostsController::class, 'edit']);
Route::put('posts/{post}', [PostsController::class, 'update']);
Route::delete('posts/{post}', [PostsController::class, 'destroy']);

Route::group(['middleware' => ['auth:sanctum', 'verified']],function(){
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/kerja', [KerjaController::class, 'index'])->name('kerja');
Route::get('lamar', [KerjaController::class, 'index2'])->name('lamar');
Route::post('/kerja', [KerjaController::class, 'store'])->name('kerja');
Route::get('/daftar/{id}', [KerjaController::class, 'daftar']);
Route::get('/add-kerja', [KerjaController::class, 'addKerja']);
Route::get('/add-lamar/{id}', [KerjaController::class, 'addLamar']);
Route::get('/get-lamar/{id}', [KerjaController::class, 'getLamarsByKerja']);


