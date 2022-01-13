<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;




class LoginController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            "name"=>"required|string",
            "email"=>"required|string|email|unique:users,email",
            "password"=>"required|string|confirmed"
        ]);
        $roles_id = 1;
        $user = User::create([
            "name"=>$fields['name'],
            "email"=>$fields['email'],
            "password"=>base64_encode($fields['password']),
            "roles_id" => $roles_id
        ]);
        $user->save();
        $token = $user->createToken("My Token")->plainTextToken;
        return response()->json([
            "message"=>"Create User Successfully !!",
            "data"=>[
                "user"=>$user,
                "token"=>$token
            ]
        ]);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            "email"=>"required|string|email",
            "password"=>"required|string"
        ]);
        //check email
        $user = User::where('email',$fields['email'])->first();
        // check password
        if(!$user || !Hash::check($fields['password'],$user->password) || $user->roles_id !=1  )
        {
            return response()->json(['message'=>"Failed!!"],404);
        }

        $token = $user->createToken("My Token")->plainTextToken;
        return response()->json([
            "message"=>"Login Successfully !!",
            "data"=>[
                "user"=>$user,
                "token"=>$token
            ]
        ],200);
    }



    public function logout(Request $request) {
        if ($request->user())
        {
            $request->user()->tokens()->delete();
        }

        return response()->json(['message' => 'Logout Successfully !!'],200);
    }

}
