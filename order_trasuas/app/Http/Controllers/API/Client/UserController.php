<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Tymon\JWTAuth\Claims\Custom;

class UserController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            // return response()->json(['error' => 'Unauthorized'], 401);
            return response()->json(
                ['message' => 'Unauthorized'],
                401
                // 'data' => ['users' => Auth::user()]
            );
        }
        return response()->json([
            'message' => 'User successfully login!',
            $this->createNewToken($token)

            // 'data' => ['users' => Auth::user()]
        ]);
        // return $this->createNewToken($token);
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:32',
            'passwordAgain' => 'required|same:password',
            'dateOfBirth' => 'required|date',
            'phone' => 'required|between:10,12',
            'sex' => 'required|boolean',
            'address' => 'required|string|between:10,100'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        // $user = User::create(array_merge(
        //             $validator->validated(),
        //             ['password' => bcrypt($request->password)]
        //         ));
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'roles_id' => $request->roles_id = 3
        ]);
        $user->save();
        $user_id = $user->id;
        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password = bcrypt($request->password),
            'dateOfBirth' => $request->dateOfBirth,
            'phone' => $request->phone,
            'sex' => $request->sex,
            'address' => $request->address,
            'user_id' => $user_id
        ]);
        $customer->save();


        return response()->json([
            'message' => 'User successfully registered',
            'data'=>[
                'user'=>$user,
                'customer'=>$customer
            ]
        ], 201);
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile()
    {
        return response()->json(auth()->user());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,

            'user' => auth()->user()
        ]);
    }

    public function changePassWord(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|min:6|max:32',
            'new_password' => 'required|min:6|max:32',
            're_new_password' => 'required|same:new_password'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $userId = $request->user_id;

        $user = User::where('id', $userId)->update(
            ['password' => $request->new_password = bcrypt($request->new_password)]
        );

        return response()->json([
            'message' => 'User successfully changed password',
            'user' => $user,
        ], 201);
    }
    // public function changePassWord(Request $request) {
    //     $validator = Validator::make($request->all(), [
    //         'old_password' => 'required|string|min:6',
    //         'new_password' => 'required|string|confirmed|min:6',
    //         're_new_password'=>'required|same:new_password'
    //     ]);

    //     if($validator->fails()){
    //         return response()->json($validator->errors()->toJson(), 400);
    //     }
    //     $userId = $request->user_id;

    //     $user = User::where('id', $userId)->update(
    //                 ['password' => bcrypt($request->new_password)]
    //             );

    //     return response()->json([
    //         'message' => 'User successfully changed password',
    //         'user' => $user
    //     ], 201);
    // }
}
