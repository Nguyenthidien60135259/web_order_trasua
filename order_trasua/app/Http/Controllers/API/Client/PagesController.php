<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Topping;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Customer;
use App\Models\Comment;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //trang chu
    public function index()
    {
        $product = Product::all();
        $product_new = Product::orderBy('created_at', 'desc')->take(6)->get();
        $product_expensive = Product::orderBy('price', 'desc')->take(6)->get();
        $product_cheap = Product::orderBy('price', 'asc')->take(6)->get();
        return response()->json([
            'data' => [
                'product' => $product,
                'product_new' => $product_new,
                'product_expensive' => $product_expensive,
                'product_cheap' => $product_cheap,
            ]

        ]);
    }

    //menu
    function menu()
    {
        $product = Product::all();
        $category = Category::all();
        $product_new = Product::orderBy('created_at', 'desc')->get();
        $product_expensive = Product::orderBy('price', 'desc')->get();
        $product_cheap = Product::orderBy('price', 'asc')->get();
        // $topping = Topping::all();
        return response()->json([
            'data' => [
                'product' => $product,
                'category' => $category,
                'product_new' => $product_new,
                'product_expensive' => $product_expensive,
                'product_cheap' => $product_cheap,
                // 'topping'=>$topping
            ]
        ]);
    }

    function detail($id)
    {
        $product = Product::find($id);
        $topping = Topping::all();
        $comment = Comment::all();
        $customer = Customer::all();

        return response()->json([
            'data' => [
                'product' => $product,
                'topping' => $topping,
                'comment'=>$comment,
                'customer' => $customer
            ]
        ]);
    }

    // dangky
    function postSignUp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:32',
            'passwordAgain' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password = bcrypt($request->password),
            'roles_id' => $request->roles_id = 3
        ]);
        $user->save();
        return response()->json([
            "message" => "Bạn đã đăng ký thành công",
            "data" => ['user' => $user]
        ]);
    }

    //
    public function qltt($id, Request $req){
        // $user_id = $id;
        $cus_id = Customer::where('user_id','=',$id)->get();
        $customer= $cus_id[0];
        $user = User::find($id);
        // $customer = Customer::find($cus_id);
        return response()->json([
            'data' => [
                'customer' => $customer,
                'user'=>$user
            ]
        ]);
    }

    //search
    public function find($key)
    {
        $product = Product::where('name', 'Like', "%$key%")->orWhere('desc', 'like', "%$key%")->get();
        return response()->json(['product' => $product]);
    }

    //comment
    public function postComment(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
            'product_id' => 'required',
            'comment' => 'required'
         ]);
         if($validator->fails())
         {
             return response()->json(['message'=>$validator->errors()],422);
         }
        $user = $request->user_id;
        $customer = Customer::where('user_id','=',$user)->select('id')->get();
        $customer_id= $customer[0]->id;
        $comment = Comment::create([
            "customer_id" =>$customer_id,
            "product_id" => $request->product_id,
            "comment" => $request->comment,
        ]);
        $comment->save();
        return response()->json([
            "message" => "Viết bình luận thành công",
            "data" => [
                "comment"=>$comment
            ]
        ]);
    }

    public function getCheckOut($id,Request $request){
        // $user = $request->user_id;
        $customers = Customer::where('user_id',$id)->get();
        $customer= $customers[0];
        return response()->json([
            "message" => "Thành công",
            "data" => [
                "customer"=>$customer
            ]
        ]);
    }

    public function changeCus(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => 'required|between:10,12',
            'address' => 'required|string|between:10,100'

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $userId = $request->user_id;
        $customer = Customer::where('user_id', $userId)->update(
            [
                'phone' =>$request->phone,
                'address'=>$request->address
            ]
        );

        return response()->json([
            'message' => 'User successfully changed password',
            'customer'=>$customer
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
