<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    //
    public function signin(Request $request)
    {
        // validate post data
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required|min:5'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'data'=> $validator->messages()
            ]);
        }
        // end validate


        // login sign
        $credentials = request(['email','password']); // save post data

        $token = auth('api')->attempt($credentials); // result token atau false

        // check if account valid
        if(!$token){
            //if valid
            return response()->json([
                'status'=>false,
                'data'=>'Unauthorized'
            ],401);
        }
        return response()->json($this->respondWithToken($token));
    }

    protected function respondWithToken($token)
    {
        // $user = Auth::user();
        $user = auth('api')->user();
        // $user = Auth::guard('api')->user();
        // dd($user);
        return [
            'status'=>true,
            'data'=>[
                'token' => $token,
                'email' => $user->email,
                'name' => $user->name
            ]
        ];
    }
}
