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

//      Client
Route::get('home',[PagesController::class,'index']);
Route::get('menu',[PagesController::class,'menu']);
Route::get('menu/{id}',[PagesController::class,'detail']);
Route::post('Login',[PagesController::class,'postDangnhap']);
Route::get('qltk/{id}',[PagesController::class,'qltt']);
Route::post('changePassword',[UserController::class,'changePassWord']);
Route::post('changeCus',[PagesController::class,'changeCus']);
Route::post('postsignUp', [UserController::class,'register']);
Route::get('logout', [UserController::class,'logout']);
Route::get('search/{key}',[PagesController::class,'find']);
Route::post('comment',[PagesController::class,'postComment']);
Route::get('checkOut/{id}',[PagesController::class,'getCheckOut']);
Route::post('postcheckOut',[CartController::class,'postCheckOut']);

//cart
Route::get('show','App\Http\Controllers\CartController@show');
Route::get('addtocart/{id}', [CartController::class,'addToCart']);
Route::patch('update-cart', [ProductController::class, 'update']);