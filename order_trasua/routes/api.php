<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Admin\ProductController;
use App\Http\Controllers\API\Admin\CategoryController;
use App\Http\Controllers\API\Admin\ToppingController;
use App\Models\Category;
use App\Models\Topping;

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
////////////////////     ADMIN    ///////////////////////////

//Product
Route::get('products_list',[ProductController::class,'index']);
Route::post('products_create',[ProductController::class,'store']);
Route::get('products_show/{id}',[ProductController::class,'show']);
Route::post('products_update/{id}',[ProductController::class,'update']);
Route::post('products_delete/{id}',[ProductController::class,'destroy']);

// Category
Route::get("category_list",[CategoryController::class,'index']);
Route::post("category_create",[CategoryController::class,'store']);
Route::get("category_show/{id}",[CategoryController::class,'show']);
Route::post("category_update/{id}",[CategoryController::class,'update']);
Route::post('category_delete/{id}',[CategoryController::class,'destroy']);


//Topping
Route::get("topping_list",[ToppingController::class,'index']);
Route::post("topping_create",[ToppingController::class,'store']);
Route::get("topping_show/{id}",[ToppingController::class,'show']);
Route::post("topping_update/{id}",[ToppingController::class,'update']);
Route::post("topping_delete/{id}",[ToppingController::class,'destroy']);
