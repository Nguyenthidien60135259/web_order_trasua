<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;

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
// use Illuminate\Http\Request;

// Route::get('/session', function(Request $request) {
//     $request->session()->put('foo', null);
    
//     dd($request->session()->exists('foo'));
// });

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::get('getHome','App\Http\Controllers\ClientController@gethome');
Route::get('getMenu','App\Http\Controllers\ClientController@getmenu');
Route::get('getMenu/{id}','App\Http\Controllers\ClientController@product_type');
Route::get('getContact',[ClientController::class,'contact']);
Route::get('getIntroduct',[ClientController::class,'introduct']);
Route::get('detail/{id}',"App\Http\Controllers\ClientController@getdetail");
Route::get('getSignUp',"App\Http\Controllers\ClientController@getSignUp");
Route::post('postSignUp',"App\Http\Controllers\ClientController@postSignUp");
Route::get('getLogin',"App\Http\Controllers\ClientController@getLogin")->name("login");
Route::get('logout',"App\Http\Controllers\ClientController@logout");
Route::post('postLogin',"App\Http\Controllers\ClientController@postLogin")->name("login");
Route::get('search/{key}',"App\Http\Controllers\Clientcontroller@find");
Route::post('comment',"App\Http\Controllers\Clientcontroller@comment");
Route::get('ttcn','App\Http\Controllers\ClientController@qlKH');
Route::post('changePass','App\Http\Controllers\ClientController@changePassWord');
Route::post('changeCus','App\Http\Controllers\ClientController@changeCus');
Route::get('wait','App\Http\Controllers\ClientController@wait');
Auth::routes();

//cart cookie
Route::get('cart','App\Http\Controllers\CartController@index');
Route::get('add-cart/{id}','App\Http\Controllers\CartController@addCart')->name('addCart');
Route::post('setquantity/{id}','App\Http\Controllers\CartController@setquantity')->name('setquantity');
Route::get('deleteall','App\Http\Controllers\CartController@deleteall')->name('deleteall');
Route::get('delete/{id}','App\Http\Controllers\CartController@delete')->name('delete');
Route::get('checkout',"App\Http\Controllers\CartController@getcheckOut");
Route::post('postCheckOut',"App\Http\Controllers\CartController@postCheckOut");
