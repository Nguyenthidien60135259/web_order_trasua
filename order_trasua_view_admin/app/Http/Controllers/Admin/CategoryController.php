<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    public function listCategory()
    {
        $api_response = Http::get("http://127.0.0.1:8000/api/category_list");
        $data = json_decode($api_response);
        $category = $data->data->category;
        return view("admin.category.list",compact('category'));
    }
    
    public function deleteCategory(Request $request)
    {
        $api_response = Http::post("http://127.0.0.1:8000/api/category_delete/". $request->id);
        return redirect("/category_list");
    }
    
    public function createCategory()
    {
        return view("admin.category.create");
    }
    
    public function saveCreateCategory(Request $request)
    {
        $api_response = Http::post("http://127.0.0.1:8000/api/category_create?name=".$request->name);
        return redirect("/category_list");
    }
    
    public function showCategory(Request $request)
    {
        $id = $request->id;
        $api_response = Http::get("http://127.0.0.1:8000/api/category_show/".$id);
        return view("admin.category.update",compact("id"));
    }
    
    public function saveUpdateCategory(Request $request)
    {

        $name = [
            'name' => $request->name
        ];
        $api_response = Http::post("http://127.0.0.1:8000/api/category_update/".$request->id, $name);
        return redirect("/category_list");
    }
    
}
