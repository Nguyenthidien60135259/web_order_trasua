<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class InventoryController extends Controller
{
    function chartInventory()
    {
        if(Session::has("email")=="admin@gmail.com"){
            $api_response = Http::get("http://127.0.0.1:8000/api/inventory_list");
            $data = json_decode($api_response);
            $product = $data->data->product;
            $category = $data->data->category;
            $order = $data->data->order;
            $topping = $data->data->topping;
            $comment = $data->data->comment;  
            $customer = $data->data->customer;
            $context=[
                "product"=>$product,
                "category"=>$category,
                "order"=>$order,
                "topping"=>$topping,
                "comment"=>$comment,
                "customer"=>$customer
            ];
            return view("admin.inventory.chart",$context);
        }
        else{
            return redirect("/login");
        }
    }
    
    
    // from_date, to_date
    function filter_by_date(Request $request)
    {
        $data = [
            "from_date"=>$request->from_date,
            "to_date" => $request->to_date
        ];
        $api_response = Http::post("http://127.0.0.1:8000/api/filter_by_date/",$data);
        $data = json_decode($api_response);
        
        $statistical = $data->data->statistical;
        
        foreach($statistical as $key => $value)
        {
            $chart_data[] = array(
                'period' => $value->order_date,
                'order_total' => $value->order_total,
                'sales' => $value->sales,
                'profit' => $value->profit,
                'quantity' => $value->quantity
            );
        }
        echo $data = json_encode($chart_data);  
    }
    
    // 7 days before
    function subs365days(Request $request)
    {
        $data_0 = [
            'subs365days'=>$request->subs365days
        ];
        $api_response = Http::post("http://127.0.0.1:8000/api/subs365days/",$data_0);
        $data_0 = json_decode($api_response);
        $statistical = $data_0->data->statistical;
        foreach($statistical as $key => $val)
        {
            $chart_data[] = array(
                'period' => $val->order_date,
                'order_total' => $val->order_total,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }
        echo $data_0 = json_encode($chart_data);  
    }
    
    
    // this month
    function thisMonth(Request $request)
    {
        $data_2 = [
            'thisMonth' => $request->thisMonth
        ];
        $api_response = Http::post("http://127.0.0.1:8000/api/thisMonth/",$data_2);
        $data_2 = json_decode($api_response);
        $statistical = $data_2->data->statistical;
        foreach($statistical as $key => $val)
        {
            $chart_data[] = array(
                'period' => $val->order_date,
                'order_total' => $val->order_total,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }
        echo $data_2 = json_encode($chart_data);  
    }
    
}
