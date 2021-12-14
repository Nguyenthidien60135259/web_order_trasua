<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ToppingController extends Controller
{
    function listTopping()
    {
        $api_response = Http::get("http://127.0.0.1:8000/api/topping_list");
        $data = json_decode($api_response);
        $topping = $data->data->topping;
        return view("admin.topping.list",compact('topping'));
    }
    
    
    function deleteTopping(Request $request)
    {
        $api_response = Http::post("http://127.0.0.1:8000/api/topping_delete/". $request->id);
        return redirect("/topping_list");
    }
    
    
    function createTopping()
    {
        return view("admin.topping.create");
    }
    
    function saveCreateTopping(Request $request)
    {

        $data = [
          'name' => $request->name,
          'image' => $request->file('image'),
          'price' => $request->price  
        ];
        dd($data);
        $api_response = Http::post("http://127.0.0.1:8000/api/topping_create/", $data);
        // dd($api_response->json());
    }
}
