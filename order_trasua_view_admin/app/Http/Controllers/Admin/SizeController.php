<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;



class SizeController extends Controller
{
    function listSize()
    {
        if(Session::has("email")=="admin@gmail.com"){
            $api_resource = Http::get("http://127.0.0.1:8000/api/size_list");
            $data = json_decode($api_resource);
            $size = $data->data->size;
            $context = [
                "size"=>$size
            ];
            return view("admin.size.list",$context);
        }
        else{
            return redirect("/login");
        }
    }
    
    function deleteSize(Request $request)
    {
        if(Session::has("email")=="admin@gmail.com"){
            $api_resource = Http::post("http://127.0.0.1:8000/api/size_delete/".$request->id);
            return redirect("/size_list");
        }
        else{
            return redirect("/login");
        }
    }
    
    function createSize(Request $request)
    {
        if(Session::has("email")=="admin@gmail.com"){
            return view("admin.size.create");
        }
        else{
            return redirect("/login");
        }
    }
    
    function saveCreateSize(Request $request)
    {
        if(Session::has("email")=="admin@gmail.com")
        {
            $api_resource = Http::post("http://127.0.0.1:8000/api/size_create?name=".$request->name);
            return redirect("/size_list");
        }
        else{
            return redirect("/login");
        }
        
    }
    
    function showSize(Request $request)
    {
        if(Session::has("email")=="admin@gmail.com"){
            $id = $request->id;
            $api_resource = Http::get("http://127.0.0.1:8000/api/size_show/".$id);
            return view("admin.size.update",compact("id"));
        }
        else{
            return redirect("/login");
        }
    }
    
    function saveUpdateSize(Request $request)
    {
        if(Session::has("email")=="admin@gmail.com")
        {
            $name = [
                'name' => $request->name
            ];
            $api_response = Http::post("http://127.0.0.1:8000/api/size_update/".$request->id, $name);
            return redirect("/size_list");
        }
        return redirect("/login");
        
    }
}
