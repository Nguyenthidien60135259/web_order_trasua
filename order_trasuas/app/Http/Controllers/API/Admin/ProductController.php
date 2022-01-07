<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product,App\Models\Category;
use App\Models\Size;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    
    public function index()
    {
        $product = Product::all();
        $category = Category::all();
        $size = Size::all();
        return response()->json([
            'data'=>[
                'product'=>$product,
                'category'=>$category,
                'size'=>$size
            ]
        ]);
    }

   
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
           'name' => 'required|string|max:50',
           'desc' => 'required|string',
           'price' => 'required|integer',
           'size_id' => 'required|integer',
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'category_id' => 'required'
        ]);
        if($validator->fails())
        {
            return response()->json(['message'=>$validator->errors()],422);
        }
        
        $image_name = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'),$image_name);
        
        $product = Product::create([
            'name' => $request->name,
            'desc'=> $request->desc,
            'price' => $request->price,
            'size_id' => $request->size_id,
            'image' => $image_name,
            'category_id'=> $request->category_id,
        ]);
        $product->save();
        return response()->json([
            'message' => "Create Product Successfully!!",
            'data' => $product
        ]);
    }

    
    public function show(Request $request,$id)
    {
        $product = Product::find($id);
        if($product){
            return response()->json(["data"=>$product]);
        }
        else{
            return response()->json(["message"=>"Not found"]);
        }
    }

    
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if($product){
            $validator = Validator::make($request->all(),[
                'name' => 'required|string|max:50',
                'desc' => 'required|string',
                'price' => 'required|integer',
                'size_id' => 'required|integer',
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'status' => 'required|integer',
                'category_id' => 'required'
            ]);
            if($validator->fails()){
                return response()->json(['message'=>$validator->errors()],422);
            }
            if($request->hasFile('image')){
                $image_name = time().'.'.$request->image->extension();
                $request->image->move(public_path('products'),$image_name);
                $old_path = public_path().'products'.$product->image;
                if(File::exists($old_path)){
                    File::delete($old_path);
                }
            }
            else{
                $image_name = $product->image;
            }
            $product->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'price' => $request->price,
                'size_id' => $request->size_id,
                'image' => $image_name,
                'status' => $request->status,
                'category_id' => $request->category_id
            ]);
            return response()->json([
                'message'=>"Update Product Successfully!!",
                'data'=>$product
            ]);
        }
        else{
            return response()->json(['message'=>'Not found product'],404);
        }
    }

    
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product){
            $product->delete();
            return response()->json(["message"=>"Delete successfully!"]);
        }
        else{
            return response()->json(["message"=>"Not found!"]);
        }
    }
}
