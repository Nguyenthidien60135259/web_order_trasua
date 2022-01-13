<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function listCategory()
    {
        if(Session::has("email")=="admin@gmail.com"){
            $api_response = Http::get("http://127.0.0.1:8000/api/category_list");
            $data = json_decode($api_response);
            $category = $data->data->category;
            return view("admin.category.list",compact('category'));
        }
        return redirect("/login");
    }
    
    public function deleteCategory(Request $request)
    {
        if(Session::has("email")=="admin@gmail.com"){
            $api_response = Http::post("http://127.0.0.1:8000/api/category_delete/". $request->id);
            return redirect("/category_list");
            
        }
        return redirect("/login");
    }
    
    public function createCategory()
    {
        if(Session::has("email")=="admin@gmail.com"){
            return view("admin.category.create");
        }
        return redirect("/login");
    }
    
    public function saveCreateCategory(Request $request)
    {
        $api_response = Http::post("http://127.0.0.1:8000/api/category_create?name=".$request->name);
        return redirect("/category_list");
    }
    
    public function showCategory(Request $request)
    {
        if(Session::has("email") == "admin@gmail.com")
        {
            $id = $request->id;
            $api_response = Http::get("http://127.0.0.1:8000/api/category_show/".$id);
            $data = json_decode($api_response);
            $catgory = $data->data->category;
            $context = [
                "id"=>$id,
                "category"=>$catgory
            ];
            return view("admin.category.update",$context);
        }
        return redirect("/login");
    }
    
    public function saveUpdateCategory(Request $request)
    {
        if(Session::has("email") == "admin@gmail.com")
        {
            $name = [
                'name' => $request->name
            ];
            $api_response = Http::post("http://127.0.0.1:8000/api/category_update/".$request->id, $name);
            return redirect("/category_list");
        }
        return redirect("/login");
    }
    
}
