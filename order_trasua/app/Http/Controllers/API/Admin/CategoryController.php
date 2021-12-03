<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    
    public function index()
    {
        //
        $category = Category::all();
        return response()->json($category);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name'=>'required|unique:category|max:50'
        ]);
        
        // check validator ?
        if($validator->fails())
        {
            return response()->json(['message' => $validator->errors()], 404);
        }
        
        $category = Category::create([
           'category_name' => $request->category_name 
        ]);
        $category->save();
        return response()->json([
           "message" => "Create category successfully",
           "data" =>  $category
        ]);
        
        
    }

    
    public function show($id)
    {
        $category = Category::find($id);
        return response()->json(['data'=>$category ]);
    }

    
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($category)
        {
            $validator = Validator::make($request->all(),[
                'category_name' => 'required|unique:category|max:50',
            ]);
            if($validator->fails()){
                return response()->json(['message'=>$validator->errors()],422);
            }
            $category->update([
               'category_name' => $request->category_name 
            ]);
            return response()->json([
                'message'=>"Update Category Successfully",
                'data'=>$category
            ]);
        }   
        else
        {
            return response()->json(["message"=>"Not found category"],404);
        } 
    }

    
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category)
        {
            $category->delete();
            return response()->json(['message'=>'Delete Successfully'],200);
        }
        return response()->json(["message"=>"Not found!!"]);
    }
}
