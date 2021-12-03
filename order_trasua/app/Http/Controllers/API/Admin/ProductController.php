<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    
    public function index()
    {
        $product = Product::all();
        return response()->json($product);
    }

   
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
           'product_name' => 'required|max:50',
           'product_desc' => 'required',
           'product_price' => 'required|integer',
           'product_price_cost' => 'required|integer',
           'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'product_status' => 'required',
           'category_id' => 'required'
        ]);
        if($validator->fails())
        {
            return response()->json(['message'=>$validator->errors()],422);
        }
        
        $image_name = time().'.'.$request->product_image->extension();
        $request->product_image->move(public_path('products'),$image_name);
        
        $product = Product::create([
            'product_name' => $request->product_name,
            'product_desc'=> $request->product_desc,
            'product_price' => $request->product_price,
            'product_price_cost' => $request->product_price_cost,
            'product_image' => $image_name,
            'product_status' => $request->product_status,
            'category_id'=> $request->category_id,
        ]);
        $product->save();
        return response()->json([
            'messages' => "Create Product Successfully",
            'data' => $product
        ]);
    }

    
    public function show(Request $request,$id)
    {
        $product = Product::find($id);
        return $product;
    }

    
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if($product){
            $validator = Validator::make($request->all(),[
                'product_name' => 'required|unique:products|max:50',
                'product_desc' => 'required',
                'product_price' => 'required|integer',
                'product_price_cost' => 'required|integer',
                'product_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'product_status' => 'required',
                'category_id' => 'required'
            ]);
            if($validator->fails()){
                return response()->json(['message'=>$validator->errors()],422);
            }
            if($request->hasFile('product_image')){
                $image_name = time().'.'.$request->product_image->extension();
                $request->product_image->move(public_path('products'),$image_name);
                $old_path = public_path().'products'.$product->product_image;
                if(File::exists($old_path)){
                    File::delete($old_path);
                }
            }
            else{
                $image_name = $product->product_image;
            }
            $product->update([
                'product_name' => $request->product_name,
                'product_desc' => $request->product_desc,
                'product_price' => $request->product_price,
                'product_price_cost' => $request->product_price_cost,
                'product_image' => $image_name,
                'product_status' => $request->product_status,
                'category_id' => $request->category_id
            ]);
            return response()->json([
                'message'=>"Update Product Successfully",
                'data'=>$product
            ]);
        }
        else{
            return response()->json(['messagge'=>'Not found product'],404);
        }
    }

    
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product){
            $product->delete();
            return response()->json("Delete Successfully");
        }
        else{
            return response()->json(["message"=>"Not found!"]);
        }
    }
}
