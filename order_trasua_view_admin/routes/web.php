<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ToppingController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\AdminController;



Route::get('/', function () {
    return view('welcome');
});

// Route::get('dashboard','ProductController@getallProduct');

///////////////////////////////    ADMIN       /////////////////////////

// Login, register
Route::get("/login","App\Http\Controllers\Admin\AdminController@login");
Route::post("/postLogined","App\Http\Controllers\Admin\AdminController@postLogined")->name("postLogined");
Route::get("/logouted","App\Http\Controllers\Admin\AdminController@logout")->name("logouted");


// dashboard
Route::get("/dashboard","App\Http\Controllers\Admin\AdminController@dashboard")->name("dashboard");


//Product
Route::get("/product_list", "App\Http\Controllers\Admin\ProductController@listProduct");
Route::get("/product_delete/{id}", "App\Http\Controllers\Admin\ProductController@deleteProduct");
Route::get("/product_create","App\Http\Controllers\Admin\ProductController@createProduct");
Route::post("/product_save_create","App\Http\Controllers\Admin\ProductController@saveCreateProduct")->name("save_create_product");
Route::get("/product_detail/{id}","App\Http\Controllers\Admin\ProductController@updateProduct");
Route::post("/save_product_updated/{id}","App\Http\Controllers\Admin\ProductController@saveUpdateProduct")->name("save_product_updated");



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
Route::get("/topping_detail/{id}","App\Http\Controllers\Admin\ToppingController@showTopping");
Route::post("/save_topping_updated/{id}","App\Http\Controllers\Admin\ToppingController@updateTopping")->name("save_topping_updated");


//Comment
Route::get("/comment_list","App\Http\Controllers\Admin\CommentController@listComment");
Route::get("/comment_delete/{id}","App\Http\Controllers\Admin\CommentController@deleteComment");


//Order
Route::get("/order_list","App\Http\Controllers\Admin\OrderController@orderList");
Route::get("/order_detail/{id}","App\Http\Controllers\Admin\OrderController@orderDetail");
Route::post("/save_order_updated/{id}","App\Http\Controllers\Admin\OrderController@updateOrder")->name("save_order_updated");
Route::get("/print_order_PDF/{id}","App\Http\Controllers\Admin\OrderController@print_order_PDF");

// Inventory
Route::get("/inventory_list","App\Http\Controllers\Admin\InventoryController@chartInventory");
Route::post("/filter_by_date","App\Http\Controllers\Admin\InventoryController@filter_by_date");
Route::post("/subs365days","App\Http\Controllers\Admin\InventoryController@subs365days");
Route::post("/thisMonth","App\Http\Controllers\Admin\InventoryController@thisMonth");






/////////////////////////////////////////////// Client //////////////////////////////////////////



Route::get('getHome','App\Http\Controllers\Client\ClientController@gethome');
Route::get('getMenu','App\Http\Controllers\Client\ClientController@getmenu');
Route::get('getMenu/{id}','App\Http\Controllers\Client\ClientController@product_type');
Route::get('getContact',[ClientController::class,'contact']);
Route::get('getIntroduct',[ClientController::class,'introduct']);
Route::get('detail/{id}',"App\Http\Controllers\Client\ClientController@getdetail");
Route::get('getSignUp',"App\Http\Controllers\Client\ClientController@getSignUp");
Route::post('postSignUp',"App\Http\Controllers\Client\ClientController@postSignUp");
Route::get('getLogin',"App\Http\Controllers\Client\ClientController@getLogin")->name("login");
Route::get('logout',"App\Http\Controllers\Client\ClientController@logout");
Route::post('postLogin',"App\Http\Controllers\Client\ClientController@postLogin")->name("login");
Route::get('search/{key}',"App\Http\Controllers\Client\ClientController@find");
Route::post('comment',"App\Http\Controllers\Client\ClientController@comment");
Route::get('ttcn','App\Http\Controllers\Client\ClientController@qlKH');
Route::post('changePass','App\Http\Controllers\Client\ClientController@changePassWord')->name("changePass");
Route::post('changeCus','App\Http\Controllers\Client\ClientController@changeCus');
Route::get('wait','App\Http\Controllers\Client\ClientController@wait');


//cart cookie
Route::get('cart','App\Http\Controllers\Client\CartController@index');
Route::get('add-cart/{id}','App\Http\Controllers\Client\CartController@addCart')->name('addCart');
Route::post('setquantity/{id}','App\Http\Controllers\Client\CartController@setquantity')->name('setquantity');
Route::get('deleteall','App\Http\Controllers\Client\CartController@deleteall')->name('deleteall');
Route::get('delete/{id}','App\Http\Controllers\Client\CartController@delete')->name('delete');
Route::get('checkout',"App\Http\Controllers\Client\CartController@getcheckOut");
Route::post('postCheckOut',"App\Http\Controllers\Client\CartController@postCheckOut");
