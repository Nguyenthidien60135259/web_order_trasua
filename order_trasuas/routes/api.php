<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\Admin\ProductController;
use App\Http\Controllers\API\Admin\CategoryController;
use App\Http\Controllers\API\Admin\SizeController;
use App\Http\Controllers\API\Admin\ToppingController;
use App\Http\Controllers\API\Admin\CommentController;
use App\Http\Controllers\API\Client\PagesController;
use App\Http\Controllers\API\Client\UserController;
use App\Http\Controllers\API\Client\CartController;
use App\Models\Role;

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

//Size
Route::get("size_list",[SizeController::class,'index']);
Route::post("size_create",[SizeController::class,'store']);
Route::get("size_show/{id}",[SizeController::class,'show']);
Route::post("size_update/{id}",[SizeController::class,'update']);
Route::post("size_delete/{id}",[SizeController::class,'destroy']);

//Comment
Route::get("comment_list",[CommentController::class,'index']);
Route::post("comment_delete/{id}",[CommentController::class,'destroy']);



//Client
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/logout', [UserController::class, 'logout']);
    Route::post('/refresh', [UserController::class, 'refresh']);
    Route::get('/me', [UserController::class, 'userProfile']); 
    // Route::post('change-password', 'App\Http\Controllers\API\Client\PagesController@change_password');
});
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('change-password', 'App\Http\Controllers\API\Client\PagesController@changePassword');
   });

Route::post('change_pass',[PagesController::class,'changePassword']);
Route::get('home',[PagesController::class,'index']);
Route::get('menu',[PagesController::class,'menu']);
Route::get('menu/{id}',[PagesController::class,'detail']);
Route::get('search/{key}',[PagesController::class,'find']);
Route::post('comment/{id}',[PagesController::class,'postComment']);
Route::post('comment',[PagesController::class,'postComment']);
Route::get('qltk/{id}',[PagesController::class,'qltt']);

//cart
Route::get('addtocart/{id}', [CartController::class,'addToCart']);
