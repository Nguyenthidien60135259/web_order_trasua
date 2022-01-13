<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class OrderController extends Controller
{
    function orderList()
    {
        $api_response = Http::get("http://127.0.0.1:8000/api/order_list");
        $data = json_decode($api_response);
        $order = $data->data->order;
        $customer = $data->data->customer;
        foreach($order as $type){
            $type->customer=[];
            foreach($customer as $cus){
                if($type->customer_id == $cus->id){
                    array_push($type->customer,$cus);
                }
            }
        }
        $context = [
          "order"=>$order,
          "customer"=>$customer
        ];
        return view("admin.order.list",$context);
    }


    function orderDetail(Request $request)
    {
        $id = $request->id;
        $api_response = Http::get("http://127.0.0.1:8000/api/order_show/".$id);
        $data = json_decode($api_response);
        $order = $data->data->order;
        $customer = $data->data->customer;
        $order_detail = $data->data->order_detail;
        $product = $data->data->product;
        $size = $data->data->size;


        // foreach($order_detail as $type){
        //     $type->product=[];
        //     foreach($product as $item){
        //         if($type->product_id == $item->product->id){
        //             array_push($type->product,$item);
        //         }
        //     }
        // }


        // foreach($product as $type){
        //     $type->size=[];
        //     foreach($size as $item){
        //         if($type->product->size_id == $item->size->id){
        //             array_push($type->size,$item);
        //         }
        //     }
        // }


        $context = [
          "id"=>$id,
          "order"=>$order,
          "customer"=>$customer,
          "order_detail"=>$order_detail,
          "product"=>$product,
          "size"=>$size,
        ];

        return view("admin.order.detail",$context);
    }


    function updateOrder(Request $request)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://127.0.0.1:8000/api/order_update/'.$request->id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>array(
                                "id" => $request->id,
                                "status" => $request->status,
                            ),

        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    public function print_order_PDF(Request $request,$id)
    {
        $id = $request->id;
        $api_response = Http::get("http://127.0.0.1:8000/api/print_order/".$id);
        $data = json_decode($api_response);
        $order = $data->data->order;
        $customer = $data->data->customer;
        $order_detail = $data->data->order_detail;

        $product = $data->data->product;





        $context = [
          "id"=>$id,
          "order"=>$order,
          "customer"=>$customer,
          "order_detail"=>$order_detail,

          "product"=>$product
        ];

        $pdf = PDF::loadView("admin.pdf",$context);
        return $pdf->stream();
    }
}
