<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use CURLFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ToppingController extends Controller
{
    function listTopping()
    {
        if(Session::has("email")=="admin@gmail.com"){
            $api_response = Http::get("http://127.0.0.1:8000/api/topping_list");
            $data = json_decode($api_response);
            $topping = $data->data->topping;
            return view("admin.topping.list",compact('topping'));
        }
        return redirect("/login");
    }


    function deleteTopping(Request $request)
    {
        if(Session::has("email")=="admin@gmail.com")
        {
            $api_response = Http::post("http://127.0.0.1:8000/api/topping_delete/".$request->id);
            return redirect("/topping_list");
        }
        return redirect("/login");
    }


    function createTopping()
    {
        if(Session::has("email")=="admin@gmail.com"){
            return view("admin.topping.create");
        }
        return redirect("/login");
    }

    function saveCreateTopping(Request $request)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://127.0.0.1:8000/api/topping_create',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                                        'name' => $request->name,
                                        'image'=> new CURLFILE($request->image),
                                        'price' => $request->price
                                    ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }



    function showTopping(Request $request)
    {
        if(Session::has("email")=="admin@gmail.com"){
            $id = $request->id;
            $api_response = Http::get("http://127.0.0.1:8000/api/topping_show/".$id);
            $data = json_decode($api_response);
            $topping = $data->data->topping;
            $context = [
                "id"=>$id,
                "topping" => $topping
            ];
            return view("admin.topping.detail",$context);
        }
        return redirect("/login");
    }



    function updateTopping(Request $request)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://127.0.0.1:8000/api/topping_update/'.$request->id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('name' => $request->name,
                                    'image'=> new CURLFILE($request->image),
                                    'price' => $request->price
                                ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}
