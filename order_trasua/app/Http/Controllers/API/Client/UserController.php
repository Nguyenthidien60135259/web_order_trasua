<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
<<<<<<< HEAD
            'name' => 'required',
=======
            'name' => 'required|min:6',
>>>>>>> 537cd46524d66fae9e7152023001d5763addfcf9
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:32',
            'passwordAgain' => 'required|same:password',
            'dateOfBirth' => 'required|date',
            'phone' => 'required|between:10,12',
            'sex' => 'required|boolean',
<<<<<<< HEAD
            'address' => 'required'
=======
            'address' => 'required|string|between:10,100'
>>>>>>> 537cd46524d66fae9e7152023001d5763addfcf9
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

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|max:32',
            ],
            [ //hi???n th??? th??ng b??o l???i
                'email.required' => 'B???n ch??a nh???p email',
                'password.required' => 'B???n ch??a nh???p m???t kh???u',
                'password.min' => 'M???t kh???u t??? 6 k?? t??? tr??? l??n',
                'password.max' => 'M???t kh???u kh??ng ???????c qu?? 32 k?? t???'
            ]
        );
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            $user = $request->user();
            $tokenResult = $user->createToken('Personal Acess Token');
            $token = $tokenResult->token;
            $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();
            $user = Auth::user();
            // dd($user);
            return response()->json(['message' => '????ng nh???p th??nh c??ng']);
        } else {
            return response()->json(['message' => '????ng nh???p kh??ng th??nh c??ng: sai email ho???c m???t kh???u']);
        }
    }


    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Successfully logged out']);
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
            ['password' => bcrypt($request->new_password)]
        );
        $customer = Customer::where('user_id', $userId)->update(
            ['password' => bcrypt($request->new_password)]
        );

        return response()->json([
            'message' => 'User successfully changed password',
            'user' => $user,
            'customer'=>$customer
        ], 201);
    }
}
