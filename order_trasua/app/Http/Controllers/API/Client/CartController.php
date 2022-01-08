<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Size;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Exception;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function addToCart(Request $request, $id)
    {
        // $id = $request->id;
        $product = Product::find($id);
        return response()->json([
            'message' => "Product added to cart successfully!",
            'data' => [
                'product' => $product

            ]
        ]);
    }

    //
    public function postCheckOut(Request $req)
    {
        // validate

        $validator = Validator::make($req->all(), [
            'name' => 'required|min:6',
            'address' => 'required',
            'phone' => 'required|digits_between:10,12',
            'note' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }
        $user_id = $req->user_id;
        try {
            $cus = Customer::where('user_id', $user_id)->select('id')->get();
            $customer_id = $cus[0]->id;
            $order = Order::create([
                'customer_id' => $customer_id,
                'total' => $req->total,
                'status' => $req->status = 1,
                'name' => $req->name,
                'address' => $req->address,
                'phone' => $req->phone,
                'note' => $req->note,
                'order_date'=>Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'),
                'table_id' => $req->table_id = 1
            ]);
            $order->save();
            $cart = json_decode($req->cart);
            if (count($cart) > 0) {
                foreach ($cart as $item) {
                    $size = Size::where('name', $item->size)->select('id')->get();
                    $size_id = $size[0]->id;
                    $orderDetail = OrderDetail::create([
                        'order_id' => $order->id,
                        'product_id' => $item->id,
                        'quantity' => $item->quantity,
                        'listTopping' => $item->topping,
                        'size_id' => $size_id
                    ]);
                    $orderDetail->save();
                }
            }

            return response()->json([
                "message" => "Succedfuly",
                'data' => [
                    'order' => $order,
                    'orderDetail' => $orderDetail,
                ]
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return response()->json([
            "message" => "Unauthorised"
        ]);
    }
}
