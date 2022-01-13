<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Size;
use App\Models\Topping;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Statistical;
use App\Models\ToppingDetail;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    // donut 
    public function index()
    {
        $product = Product::count();
        $category = Category::count();
        $order = Order::count();
        $topping = Topping::count();
        $comment = Comment::count();
        $customer = Customer::count();
        return response()->json([
            "data"=>[
                "product"=>$product,
                "category"=>$category,
                "order"=>$order,
                "topping"=>$topping,
                "comment"=>$comment,
                "customer"=>$customer
            ]
        ]);
    }
    
    
    // from date, to date
    public function filter_by_date(Request $request)
    {
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
        $statistical = Statistical::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();
        
        return response()->json([
            "data"=> [
                "from_date"=>$from_date,
                "to_date"=>$to_date,
                "statistical"=>$statistical,
                
            ]
        ]);
    }
    
    // 7 days before
    public function subs365days(Request $request)
    {
        $subs365days = $request->input("subs7days");
        $subs365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $statistical = Statistical::whereBetween('order_date',[$subs365days,$now])->orderBy('order_date','ASC')->get();
        return response()->json([
            'data'=>[
                "statistical" => $statistical
            ]
        ]);
    }
    
    // // // 60 days trước
    // public function sub60days(Request $request)
    // {
    //     $sub60days = $request->input("sub60days");
    //     $sub60days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(60)->toDateString();
    //     $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    //     $statistical = Statistical::whereBetween('order_date',[$sub60days,$now])->orderBy('order_date','ASC')->get();
    //     return response()->json([
    //         "data"=>[
                
    //             "statistical" => $statistical
    //         ]
    //     ]);
    // }
    
    // tháng này
    public function thisMonth(Request $request)
    {
        $thisMonth = $request->input("thisMonth");
        $thisMonth = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $statistical = Statistical::whereBetween('order_date',[$thisMonth,$now])->orderBy('order_date','ASC')->get();
        return response()->json([
            "data"=>[
                "statistical" => $statistical
            ]
        ]);
    }
}
