<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class AdminController extends Controller
{

    public function dashboard()
    {
        if(Session::has('email')=='admin@gmail.com')
        {
            return view("admin.index");
        }
        else{
            return redirect("/login");
        }
    }

    function login()
    {
        return view("admin.login_register.login");
    }


    function postLogined(Request $request)
    {
        $email = $request->session()->put('email',$request->email);
        $password = $request->session()->put('password',$request->password);
        $data = [
            'email'=>Session::get('email'),
            'password'=>Session::get('password')
        ];

        if($data['email'] == "admin@gmail.com" && $data['password'] == "1234")
        {
            Session::put('name',"Admin");
            return view("admin.index");
        }
        else{
            return redirect("/login");
        }
    }

    function logout(Request $request)
    {
        $request->session()->flush();
        return redirect("/login");
    }
}
