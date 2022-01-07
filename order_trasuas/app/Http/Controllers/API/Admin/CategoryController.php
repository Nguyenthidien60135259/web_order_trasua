<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    
    public function index()
    {
        //
        $category = Category::all();
        return response()->json(['data'=>["category"=>$category]]);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|string|max:50'
        ]);
        
        // check validator ?
        if($validator->fails())
        {
            return response()->json(['message' => $validator->errors()], 422);
        }
        
        $category = Category::create([
           'name' => $request->name
        ]);
        $category->save();
        return response()->json([
           "message" => "Create category successfully",
           "data" =>  [
               'category'=>$category
               ]
        ]);
    }

    
    public function show($id)
    {
        $category = Category::find($id);
        if($category){
            return response()->json(['data'=>["category"=>$category]]);
        }
        else{
            return response()->json(['messge'=>"Not found"]);
        }
    }

    
    public function update(Request $request, $id)
    {
        // dd($request->name);
        // exit();
        $category = Category::find($id);
        if($category)
        {
            $validator = Validator::make($request->all(),[
                'name' => 'required|string|max:50',
            ]);
            if($validator->fails()){
                return response()->json(['message'=>$validator->errors()],422);
            }
            $category->update([
               'name' => $request->name 
            ]);
            return response()->json([
                'message'=>"Update Category Successfully",
                'data'=>[
                    'category'=>$category
                ]
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
            return response()->json(['message'=>'Delete Successfully']);
        }
        return response()->json(["message"=>"Not found!!"]);
    }
}
