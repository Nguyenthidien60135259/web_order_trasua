<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SizeController extends Controller
{
    function listSize()
    {
        $api_resource = Http::get("http://127.0.0.1:8000/api/size_list");
        $data = json_decode($api_resource);
        $size = $data->data->size;
        return view("admin.size.list",compact("size"));
    }
    
    function deleteSize(Request $request)
    {
        $api_resource = Http::post("http://127.0.0.1:8000/api/size_delete/".$request->id);
        return redirect("/size_list");
    }
    
    function createSize()
    {
        return view("admin.size.create");
    }
    
    function saveCreateSize(Request $request)
    {
        $api_resource = Http::post("http://127.0.0.1:8000/api/size_create?name=".$request->name);
        return redirect("/size_list");
    }
    
    function showSize(Request $request)
    {
        $id = $request->id;
        $api_resource = Http::get("http://127.0.0.1:8000/api/size_show/".$id);
        return view("admin.size.update",compact("id"));
    }
    
    function saveUpdateSize(Request $request)
    {

        $name = [
            'name' => $request->name
        ];
        $api_response = Http::post("http://127.0.0.1:8000/api/size_update/".$request->id, $name);
        return redirect("/size_list");
    }
}
