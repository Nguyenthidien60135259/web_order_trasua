<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use CURLFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function listProduct()
    {
        if(Session::has('email')=='admin@gmail.com'){
            $response = Http::get("http://127.0.0.1:8000/api/products_list");
            $data = json_decode($response);
            $product = $data->data->product;
            $category = $data->data->category;
            $size = $data->data->size;
            // foreach($product as $pro){
            //     $pro->size=[];
            //     foreach($size as $si){
            //         if(($pro->size_id) == ($si->id))
            //         {
            //             array_push($pro->size,$si);
            //         }
            //     }
            // }

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
            $context = [
            "product"=>$product,
            "category"=>$category,
            "size"=>$size
            ];

            return view("admin.product.list",$context);
        }
        else{
            return redirect("/login");
        }
    }

    public function deleteProduct(Request $request)
    {
        $api_response = Http::post("http://127.0.0.1:8000/api/products_delete/".$request->id);
        return redirect("/product_list");
    }

    public function createProduct(Request $request)
    {
        if(Session::has('email')=="admin@gmai.com")
        {
            $api_response = Http::get("http://127.0.0.1:8000/api/products_list");
            $data=json_decode($api_response);
            $category = $data->data->category;
            $size = $data->data->size;
            $context=[
                "category"=>$category,
                "size"=>$size
            ];
            return view("admin.product.create",$context);
        }
        else{
            return redirect("/login");
        }
    }

    public function saveCreateProduct(Request $request)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://127.0.0.1:8000/api/products_create',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
                                    'name' => $request->name,
                                    'desc'=> $request->desc,
                                    'price' => $request->price,
                                    'price_cost' => $request->price_cost,
                                    'size_id' => $request->size_id,
                                    'image' => new CURLFILE($request->image),
                                    'category_id'=> $request->category_id,
                                ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }


    function updateProduct(Request $request)
    {
        if(Session::has('email')=="admin@gmail.com")
        {
            $id = $request->id;
            $api_response=Http::get("http://127.0.0.1:8000/api/products_show/".$id);
            $data = json_decode($api_response);
            $product = $data->data->product;
            $category = $data->data->category;
            $size = $data->data->size;
            $context=[
                "id" => $id,
                "product" => $product,
                "category" => $category,
                "size" => $size
            ];
            return view("admin.product.detail",$context);
        }
        else{
            return redirect("/login");
        }
    }



    function saveUpdateProduct(Request $request)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://127.0.0.1:8000/api/products_update/'.$request->id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
                                    'name' => $request->name,
                                    'desc' => $request->desc,
                                    'price' => $request->price,
                                    'price_cost' => $request->price_cost,
                                    'size_id' => $request->size_id,
                                    'image'=> new CURLFILE($request->image),
                                    'category_id' =>$request->category_id,
                                ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }
}
