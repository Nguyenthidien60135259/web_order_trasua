<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Topping;
use App\Models\Size;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    function getCustomer()
    {
        $user = Auth::user();
        return view('page.customer',['customer'=>$user]);
    }
    
    function postCustomer(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users,email',
            'password'=>'required|min:6|max:32',
            'passwordAgain'=>'required|same:password',
            'dateOfBirth'=>'required|date',
            'sex'=>'required|sex',
            'address'=>'required|max:100',
            'phone'=>'required|max:10',

        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }
        $user = User::select('id', 'name','email','password')->get();

        $customer = Customer::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password = bcrypt($request->password),
            'dateOfBirth'=>$request->dateOfBirth,
            'sex' => $request->sex,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'user_id'=>$user->id
        ]);
       
        if($request->changePassword == "on")
        {
             $this->validate($request,[
            'password'=>'required|min:6|max:32',
            'passwordAgain'=>'required|same:password',
        ],
        [
            
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu phải có ít nhất 6 kí tự',
            'password.max'=>'Mật khẩu không được quá 32 kí tự',
            'passwordAgain.required'=>'Hãy nhập lại mật khẩu',
            'passwordAgain.same'=>'Mật khẩu nhập lại không đúng',
        ]);
            $customer->password = bcrypt($request->password);
        }    
        $customer->save();
        return response()->json(['message' => 'Them thanh cong']);
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
    public function qltt($id, Request $req){
        $cus_id = Customer::where('user_id','=',$id)->get();
        $customer= $cus_id[0];
        $user = User::find($id);
        return response()->json([
            'data' => [
                'customer' => $customer,
                'user'=>$user
            ]
        ]);
    }

     /**
     * Change the current password
     * @param Request $request
     * @return Renderable
     */
    public function changePassword(Request $request)
    {       
        $user = Auth::user();
    
        $userPassword = $user->password;
        
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|same:re_new_password|min:6',
            're_new_password' => 'required',
        ]);

        if (!Hash::check($request->old_password, $userPassword)) {
            return back()->withErrors(['old_password'=>'password not match']);
        }

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back()->with('success','password successfully updated');
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
