<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $size = Size::all();
        return response()->json(['data' => ['size'=>$size]]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|unique:size|max:50|string'
        ]);
        
        // check validator ?
        if($validator->fails())
        {
            return response()->json(['message' => $validator->errors()], 422);
        }
        
        $size = Size::create([
           'name' => $request->name
        ]);
        $size->save();
        return response()->json([
           "message" => "Create size successfully",
           "data" =>  [
               "size"=>$size
           ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $size = Size::find($id);
        if($size)
        {
            return response()->json(['data'=>["size"=>$size]]);
        }
        else{
            return response()->json(['message'=>"Not found"]);
        }
       
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
        $size = Size::find($id);
        if($size)
        {
            $validator = Validator::make($request->all(),[
                'name' => 'required|unique:size|max:50|string',
            ]);
            if($validator->fails()){
                return response()->json(['message'=>$validator->errors()],422);
            }
            $size->update([
               'name' => $request->name 
            ]);
            return response()->json([
                'message'=>"Update Size Successfully",
                'data'=>$size
            ]);
        }   
        else
        {
            return response()->json(["message"=>"Not found size"],404);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size = Size::find($id);
        if($size)
        {
            $size->delete();
            return response()->json(['message'=>'Delete Successfully'],200);
        }
        return response()->json(["message"=>"Not found!!"]);
    }
}
