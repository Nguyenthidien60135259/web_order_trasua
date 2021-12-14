<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ToppingController;
use App\Http\Controllers\Admin\CommentController;
Route::get('/', function () {
    return view('welcome');
});

// Route::get('dashboard','ProductController@getallProduct');

///////////////////////////////    ADMIN       /////////////////////////

Route::get("/dashboard","App\Http\Controllers\Admin\ProductController@dashboard");


//Product
Route::get("/product_list", "App\Http\Controllers\Admin\ProductController@listProduct");
Route::get("/product_delete/{id}", "App\Http\Controllers\Admin\ProductController@deleteProduct");
Route::get("/product_create","App\Http\Controllers\Admin\ProductController@createProduct");
Route::post("/product_save_create","App\Http\Controllers\Admin\ProductController@saveCreateProduct")->name("save_create_product");



//Category
Route::get("/category_list","App\Http\Controllers\Admin\CategoryController@listCategory");
Route::get("/category_create","App\Http\Controllers\Admin\CategoryController@createCategory");
Route::post("/save_create_category","App\Http\Controllers\Admin\CategoryController@saveCreateCategory")->name("save_category");
Route::get("/category_delete/{id}","App\Http\Controllers\Admin\CategoryController@deleteCategory");
Route::post("/category_update/{id}/updated","App\Http\Controllers\Admin\CategoryController@saveUpdateCategory");
Route::get("/show_category/{id}","App\Http\Controllers\Admin\CategoryController@showCategory");



//Size
Route::get("/size_list","App\Http\Controllers\Admin\SizeController@listSize");
Route::get("/size_delete/{id}","App\Http\Controllers\Admin\SizeController@deleteSize");
Route::get("/size_create","App\Http\Controllers\Admin\SizeController@createSize");
Route::post("/save_create_size","App\Http\Controllers\Admin\SizeController@saveCreateSize")->name("save_size");
Route::post("/size_update/{id}/updated","App\Http\Controllers\Admin\SizeController@saveUpdateSize");
Route::get("/show_size/{id}","App\Http\Controllers\Admin\SizeController@showSize");


//Topping 
Route::get("/topping_list","App\Http\Controllers\Admin\ToppingController@listTopping");
Route::get("/topping_delete/{id}","App\Http\Controllers\Admin\ToppingController@deleteTopping");
Route::get("/topping_create","App\Http\Controllers\Admin\ToppingController@createTopping");
Route::post("/save_create_topping","App\Http\Controllers\Admin\ToppingController@saveCreateTopping")->name("save_create_topping");


//Comment
Route::get("/comment_list","App\Http\Controllers\Admin\CommentController@listComment");
Route::get("/comment_delete/{id}","App\Http\Controllers\Admin\CommentController@deleteComment");
