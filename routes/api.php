<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['api', 'auth:sanctum']], function(){
    Route::post('/sendby/template', [App\Http\Controllers\ApiController::class, 'sendby_template'])->name('sendby.template');
    Route::post('/sendby/product', [App\Http\Controllers\ApiController::class, 'sendby_product'])->name('sendby.product');
    Route::post('/sendby/service', [App\Http\Controllers\ApiController::class, 'sendby_service'])->name('sendby.service');
});
