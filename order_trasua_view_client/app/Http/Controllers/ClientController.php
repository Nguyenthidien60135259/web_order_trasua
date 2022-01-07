<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Product;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class ClientController extends Controller
{
    //hàm khởi tạo
   public function __construct()
    {   
        if(Auth::check())
        {
            $this->middleware('auth')->except('logout'); 
        } 

    }
    //
    public function gethome(Request $request)
    {
        $response = Http::get("http://127.0.0.1:8001/api/home");
        $data = json_decode($response);
        $products = $data->data->product;
        $product_expensive = $data->data->product_expensive;
        $product_cheap = $data->data->product_cheap;
        $product_new = $data->data->product_new;
        // dd($data);
        return view('home', compact('products', 'product_expensive', 'product_cheap', 'product_new'));
    }

    public function getmenu(Request $request)
    {
        $response = Http::get("http://127.0.0.1:8001/api/menu");
        $data = json_decode($response);
        $products = $data->data->product;
        $category = $data->data->category;
        $product_expensive = $data->data->product_expensive;
        $product_cheap = $data->data->product_cheap;
        $product_new = $data->data->product_new;
        // $topping = $data->data->topping;
        // $product = $products->id;
        foreach ($category as $type) {
            $type->products = [];
            foreach ($products as $item) {
                if (($item->category_id) == ($type->id)) {
                    array_push($type->products, $item);
                }
            }
        }
        // dd($category);
        return view('menu', compact('products', 'category', 'product_expensive', 'product_cheap', 'product_new'));
    }

    public function getdetail(Request $request)
    {
        $response = Http::get("http://127.0.0.1:8001/api/menu/".$request->id);
        $data = json_decode($response);
        $products = $data->data->product;
        $topping = $data->data->topping;
        $comment=$data->data->comment;
        $customer = $data->data->customer;
        $type = [];
            foreach ($comment as $item) {
                if (($item->product_id) == ($products->id)) {
                    array_push($type, $item);
                }            
            }
        return view('detail', compact('products','topping','comment','type'));
    }

    public function contact()
    {
        return view('contact');
    }
    public function wait()
    {
        return view('wait');
    }

    public function introduct()
    {
        return view('introduct');
    }

    public function getSignUp(){
        return view('signup');
    }
    public function postSignUp(Request $request)
    {
        $response = Http::post("http://127.0.0.1:8001/api/postsignUp",[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'passwordAgain'=>$request->passwordAgain,
            'dateOfBirth'=>$request->dateOfBirth,
            'phone'=>$request->phone,
            'sex'=>$request->sex,
            'address'=>$request->address
        ]);
        $data = json_decode($response);
        // dd($data);
        if($data->message == "User successfully registered") 
        {
            return redirect('getLogin')->with('thongbao','Đăng ký thành công');
        } else {
            return redirect('getsignUp')->with('thongbao', 'Đăng ký không thành công');
        }
    }

    public function getLogin(){
        return view('login');
    }

    public function postLogin(Request $request){
        $response = Http::post("http://127.0.0.1:8001/api/auth/login/",[
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'roles_id' => 3 ])) 
        {
            return redirect('getHome');
        } else {
            return redirect('getLogin')->with('thongbao', 'Đăng nhập không thành công: sai email hoặc mật khẩu');
        }

    }
    
    public function logout() {
        Auth::logout();
        return redirect('getHome');

    }

    public function find(Request $request)
    {
        $response = Http::get("http://127.0.0.1:8001/api/search/".$request->key);
        $data = json_decode($response);
        $products = $data->product;
        //dd($data);
        return view('search', compact('products'));
    }

    public function qlKH(Request $request){
        $id = Auth::user()->id;
        $response = Http::get("http://127.0.0.1:8001/api/qltk/".$id);
        $data = json_decode($response);
        $customer = $data->data->customer;
        $user = $data->data->user;
        return view('thongtinKH',compact('customer', 'user'));
    }

    public function changePassWord(Request $request){
        $user_id = Auth::user()->id;
        $response = Http::post("http://127.0.0.1:8001/api/changePassword",[
            'old_password'=>$request->old_password,
            'new_password'=>$request->new_password,
            're_new_password'=>$request->re_new_password,
            'user_id'=>$user_id
        ]);
        
        $data = json_decode($response);
        // dd($data);
        return back()->with('thong bao','Succeedful!');
    }

    public function changeCus(Request $request){
        $user_id = Auth::user()->id;
        $response = Http::post("http://127.0.0.1:8001/api/changeCus",[
            'address'=>$request->address,
            'phone'=>$request->phone,
            'user_id'=>$user_id
        ]);
        
        $data = json_decode($response);
        // dd($data);
        return redirect('ttcn')->with('thong bao','Succeedful!');
    }

    public function comment(Request $request){
        $response = Http::post("http://127.0.0.1:8001/api/comment",[
            'user_id'=>$request->user_id,
            'product_id'=>$request->product_id,
            'comment'=>$request->comment
        ]);
        return redirect('ttcn')->with('thong bao','Succeedful!');
    }

}
