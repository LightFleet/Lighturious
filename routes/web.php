<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;

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
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/products', [ProductController::class, 'index'])->middleware(['userAuth']);
Route::get('/products/{product}', [ProductController::class, 'show'])->middleware(['userAuth']);

Route::get('/import', function (){
    return view('products.import');
})->middleware(['userAuth']);

