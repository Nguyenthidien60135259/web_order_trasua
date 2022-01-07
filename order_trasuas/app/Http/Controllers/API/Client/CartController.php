<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;

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

        $cart = $req->cart;
        // validate

        $validator = Validator::make($req->all(), [
            'name' => 'required|min:6',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required|digits_between:10,12',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }
        $user_id = Auth::user()->id;
        try {
            // $customer = Customer::create([
            //     'name' => $req->name,
            //     'email' => $req->email,
            //     'address' => $req->address,
            //     'phone' => $req->phone,
            // ]);
            // $customer->save();
            $customer_id = Customer::where('user_id',$user_id);
            $order = Order::create([
                'customer_id' => $customer_id,
                'total' => $req->total,
                'address' => $req->address,
                'phone' => $req->phone,
                'note' => $req->note
            ]);
            $order->save();

            if (count($cart) > 0) {
                foreach ($cart as $key => $item) {
                    $orderDetail = OrderDetail::create([
                        'order_id' => $order->id,
                        'product_id' => $item->id,
                        'quantily' => $item->quantity,
                        'toppingList' => $item->toppingList,
                        'size' => $req->size
                    ]);
                    $orderDetail->save();
                }
            }
            return response()->json([
                "message" => "Succedfuly"
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return response()->json([
            "message" => "Unauthorised"
        ]);
    }

}

