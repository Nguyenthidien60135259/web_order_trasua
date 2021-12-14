<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function index()
    {
        $comment = Comment::all();
        $product = Product::all();
        $customer = Customer::all();
        return response()->json([
           'data'=>[
               'comment'=>$comment,
               'product'=>$product,
               'customer'=>$customer
           ]
        ]);
    }

    
    public function destroy($id)
    {
        $comment = Comment::find($id);
        if($comment){
            $comment->delete();
            return response()->json(['message'=>"Delete Successfully!"]);
        }
        return response()->json(['message'=>"Not found!!"]);
    }
}
