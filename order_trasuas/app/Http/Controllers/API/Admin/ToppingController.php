<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topping;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ToppingController extends Controller
{
    public function index()
    {
        $topping = Topping::all();
        return response()->json(['data'=>["topping"=>$topping]]);
    }

    public function store(Request $request)
    {
        dd($request->all());
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:50|unique:toppings',
            'image' => 'required|image|mimes:png,jpg|max:2048',
            'price' => 'required|integer'
            
         ]);
         if($validator->fails())
         {
            return response()->json(['message'=>$validator->errors()],422);
         }
         
         $image_name = time().'.'.$request->file('image')->extension();
         $request->file('image')->move(public_path('toppings'),$image_name);
         
         $topping = Topping::create([
             'name' => $request->name,
             'image' => $image_name,
             'price' => $request->price   
         ]);
         $topping->save();
         return response()->json([
             'messages' => "Create Topping Successfully",
             'data' => [
                 "topping" => $topping
             ]
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
                "name" => "required",
                "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
                "price" => "required|integer"
            ]);
            if($validator->fails())
            {
                return response()->json(["message"=>$validator->errors()],422);
            }
            if($request->hasFile("image"))
            {
                $image_name = time().'.'.$request->image->extension();
                $request->image->move(public_path('topping'),$image_name);
                $old_path = public_path().'topping'.$topping->image;
                if(File::exists($old_path)){
                    File::delete($old_path);
                }
            }
            else{
                $image_name = $topping->image;
            }
            $topping->update([
               "name" => $request->name,
               "image" => $image_name,
               "price" => $request->price 
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
