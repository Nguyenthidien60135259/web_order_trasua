<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CommentController extends Controller
{
    function listComment()
    {
        $api_response = Http::get("http://127.0.0.1:8000/api/comment_list");
        $data = json_decode($api_response);
        $comment = $data->data->comment;
        $product = $data->data->product;
        $customer = $data->data->customer;
        
        foreach ($comment as $type) {
            $type->product=[];
            foreach($product as $item)
            {
                if(($item->id) == ($type->product_id))
                {
                    array_push($type->product,$item);
                }
            }
        }
        foreach ($comment as $type) {
            $type->customer=[];
        foreach($customer as $item)
        {
            if(($item->id) == ($type->customer_id))
            {
                array_push($type->customer,$item);
            }
        }
            }
        return view("admin.comment.list",compact("comment","product",'customer'));
    }
    
    function deleteComment(Request $request)
    {
        $api_response = Http::post("http://127.0.0.1:8000/api/comment_delete/".$request->id);
        return redirect("/comment_list");
    }
}
