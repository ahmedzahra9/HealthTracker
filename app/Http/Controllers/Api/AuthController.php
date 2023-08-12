<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use \Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Setting;
use App\Models\PhoneToken;
use App\Http\Traits\PhotoTrait;

class AuthController extends Controller
{
    use PhotoTrait;

    public function login(Request $request){
        try {
            // validation
            $validator = Validator::make($request->all(),[
                'email'=>'required',
                'password'=>'required',
            ]);
            if ($validator->fails()){
                return apiResponse(null,$validator->errors(),'422');
            }

            $data = $request->only('email','password','fcm_token');

            $credentials = ['email'=>$data['email'] , 'password'=>$data['password']];
            $token = user_api()->attempt($credentials);
            if ($token){
                $user = user_api()->user();
                $user->token = $token;
                PhoneToken::updateOrCreate([
                    'user_id'=>$user->id ,
                    'phone_token'=>$data['fcm_token'],
                    'type'=>'android',
                ]);
                return apiResponse($user);
            }else{
                return apiResponse(null,'invalid credentials register please ','409');
            }

        }catch (\Exception $ex){
            return apiResponse($ex->getCode(),$ex->getMessage(),'422');
        }

    }

    //=======================================================================================================

    public function register(Request $request){
        try {
            // validation
            $validator = Validator::make($request->all(),[
                'email'=>'required|unique:users,email',
                'password'=>'required',
                'phone'=>'required',
                'name'=>'required'
            ]);
            if ($validator->fails()){
                return apiResponse(null,$validator->errors(),'422');
            }
            $data = $request->only('name','email','phone','password');
            $data['password'] = Hash::make($request->password);
            $user = User::create($data);

            $token = user_api()->login($user); // generate token
            $user->token = $token;

            PhoneToken::updateOrCreate([
                'user_id'=>$user->id ,
                'phone_token'=>$request->fcm_token,
                'type'=>'android',
            ]);

            return apiResponse($user);

        }catch (\Exception $ex){
            return apiResponse($ex->getCode(),$ex->getMessage(),'422');
        }

    }

    //===========================================
    public function profile(Request $request){
        $user = User::where('id',user_api()->user()->id)->first();
        $user->token = getToken();
        return apiResponse($user);
    }
    //===========================================
    public function update_profile(Request $request){
        // validation
        $validator = Validator::make($request->all(),[
            'email'=>'required|unique:users,email,'.user_api()->user()->id,
//            'password'=>'required',
            'phone'=>'required',
            'name'=>'required'
        ]);
        if ($validator->fails()){
            return apiResponse(null,$validator->errors(),'422');
        }
        $data = $request->only('name','phone','email','password');
        if ($request->password && $request->password != null){
            $data['password'] = Hash::make($request->password);
        }
        $user = User::where('id',user_api()->user()->id)->first();
        $user->update($data);
        $user->token =getToken();

        return apiResponse($user);

    }

    //=======================================================================================================
    public function logout(Request $request){
        $validator = Validator::make($request->all(), [ // <---
            'token' => 'required',
        ]);
        if ($validator->fails()) {
            return apiResponse(null,$validator->errors(),'422');
        }

        if (!\auth()->check())
        {
            return apiResponse(null,'logout once or token is not valid');
        }

        PhoneToken::where(['user_id' => user_api()->user()->id, 'phone_token' => $request->token])->delete();

        $token = getToken();
        if ($token != null){
            try {
                JWTAuth::setToken($token)->invalidate(); // logout user
                return apiResponse(null,'logout done');
            }catch(TokenInvalidException $e){
                return apiResponse(null,'done');
            }
        }
        else{
            return apiResponse(null,'done');
        }
    }
    //=======================================================================================================
    public function deleteAccount(Request $request){
        $validator = Validator::make($request->all(), [ // <---
            'token' => 'required',
        ]);
        if ($validator->fails()) {
            return apiResponse(null,$validator->errors(),'422');
        }

        PhoneToken::where(['user_id' => user_api()->user()->id, 'phone_token' => $request->token])->delete();
        User::where('id' , user_api()->user()->id)->delete();

        return apiResponse(null,'done');
    }
    //=======================================================================================================



}
