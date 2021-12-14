<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    
    public function dashboard()
    {
        return view("admin.base");
    }
    
    
    
    public function listProduct()
    {
        $response = Http::get("http://127.0.0.1:8000/api/products_list"); 
        $data = json_decode($response);
        $product = $data->data->product;
        $category = $data->data->category;
        foreach ($category as $type) {
             $type->product=[];
            foreach($product as $item)
            {
                if(($item->category_id) == ($type->id))
                {
                    array_push($type->product,$item);
                }
            }
        }
        return view("admin.product.list",compact('product','category'));
    }
    
    public function deleteProduct(Request $request)
    {
        $api_response = Http::post("http://127.0.0.1:8000/api/products_delete/". $request->id);
        return redirect("/product_list");
    }
    
    public function createProduct(Request $request)
    {
        return view("admin.product.create");
    }
    
    public function saveCreateProduct(Request $request)
    {
        $data = [
          'name'=>$request->name,
          'desc'=>$request->desc,
          'price'=>$request->price,
          'image'=>$request->image,
          'category_id'=>$request->category,
          'size_id'=>$request->size_id  
        ];
        $api_response=Http::post("http://127.0.0.1:8001/product_create",$data);
        return redirect("/product_create");
    }
}
