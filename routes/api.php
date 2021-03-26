<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAPIController;
use App\Http\Controllers\ProductAPIController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginAPIController::class, 'login']);
Route::get('/logout', [LoginAPIController::class, 'logout']);

Route::get('/products', [ProductAPIController::class, 'index']);
Route::get('/products/{product}', [ProductAPIController::class, 'show']);
Route::get('/products/{product}/related', [ProductAPIController::class, 'related']);

Route::post('/import', [\App\Http\Controllers\CsvImportController::class, 'import']);
