<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topping;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class ToppingController extends Controller
{
    public function index()
    {
        $topping = Topping::all();
        return response()->json($topping);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'topping_name' => 'required|max:50',
            'topping_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'topping_price' => 'required|integer'
            
         ]);
         if($validator->fails())
         {
             return response()->json(['message'=>$validator->errors()],422);
         }
         
         $image_name = time().'.'.$request->topping_image->extension();
         $request->topping_image->move(public_path('toppings'),$image_name);
         
         $topping = Topping::create([
             'topping_name' => $request->topping_name,
             'topping_image' => $image_name,
             'topping_price' => $request->topping_price
             
             
         ]);
         $topping->save();
         return response()->json([
             'messages' => "Create Topping Successfully",
             'data' => $topping
         ]);
    }

    public function show($id)
    {
        $topping = Topping::find($id);
        if($topping)
        {
            return response()->json([
               "message" => "Found Topping!!",
               "data" => $topping 
            ]);
        }
        else{
            return response()->json(['message'=>"Not found"]);
        }
    }

    public function update(Request $request, $id)
    {
        $topping = Topping::find($id);
        if($topping)
        {
            $validator = Validator::make($request->all(),[
                "topping_name" => "required|unique:toppings",
                "topping_image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
                "topping_price" => "required|integer"
            ]);
            if($validator->fails())
            {
                return response()->json(["message"=>$validator->errors()],422);
            }
            if($request->hasFile("topping_image"))
            {
                $image_name = time().'.'.$request->topping_image->extension();
                $request->topping_image->move(public_path('products'),$image_name);
                $old_path = public_path().'products'.$topping->topping_image;
                if(File::exists($old_path)){
                    File::delete($old_path);
                }
            }
            else{
                $image_name = $topping->topping_image;
            }
            $topping->update([
               "topping_name" => $request->topping_name,
               "topping_image" => $image_name,
               "topping_price" => $request->topping_price 
            ]);
            $topping->save();
            return response()->json([
                "message" => "Update topping successfully",
                "data" => $topping
            ]);
        }
        else{
            return response()->json(["message"=>"Not found topping"]);
        }
    }

    public function destroy($id)
    {
        $topping = Topping::find($id);
        if($topping)
        {
            $topping->delete();
            return response()->json(["message"=>"Delete successfully"]);
        }
        else{
            return response()->json(["message"=>"Not found!"]);
        }
    }
}
