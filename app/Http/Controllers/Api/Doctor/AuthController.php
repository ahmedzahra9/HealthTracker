<?php

namespace App\Http\Controllers\Api\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Traits\PaginateTrait;
use App\Models\Category;
use App\Models\Degree;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use \Illuminate\Support\Facades\Auth;
use App\Models\PhoneToken;
use App\Http\Traits\PhotoTrait;
use App\Models\User;

class AuthController extends Controller
{
    use PhotoTrait,PaginateTrait;

    public function login(Request $request){
        try {
            // validation
            $validator = Validator::make($request->all(),[
                'phone'=>'required',
                'password'=>'required',
            ]);
            if ($validator->fails()){
                return $this->apiResponse(null,$validator->errors(),'simple','422');
            }

            $data = $request->only('phone','password','fcm_token');

            $credentials = ['phone'=>$data['phone'] , 'password'=>$data['password']];
            $token = doctor_api()->attempt($credentials);
            if ($token){
                $user = Doctor::where('id',doctor_api()->user()->id)->first();
                $user->token = $token;
                PhoneToken::updateOrCreate([
                    'doctor_id'=>$user->id ,
                    'phone_token'=>$data['fcm_token'],
                    'type'=>'android',
                ]);
                return $this->apiResponse($user,'','simple');
            }else{
                return $this->apiResponse(null,'خطا فى البيانات  ','simple','409');
            }

        }catch (\Exception $ex){
            return $this->apiResponse($ex->getCode(),$ex->getMessage(),'simple','422');
        }

    }

    //=======================================================================================================
    public function categories(){
        $data = Category::query();
        return $this->apiResponse($data);
    }//end fun
    //=======================================================================================================
    public function degrees(){
        $data = Degree::query();
        return $this->apiResponse($data);
    }//end fun
    //=======================================================================================================

    public function register(Request $request){
        try {
            // validation
            $validator = Validator::make($request->all(), [
                'email' => 'required|unique:users,email|unique:doctors,email',
                'name_ar' => 'required',
                'phone' => 'required|unique:users,phone|unique:doctors,phone',
                'password' => 'required',
                'location_ar' => 'required',
                'gender' => 'required',
                'category_id' => 'required',
                'degree_id' => 'required',
            ]);
            if ($validator->fails()){
                return $this->apiResponse(null,$validator->errors(),'simple','422');
            }
            $data = $request->except('fcm_token');
            $data['password'] = Hash::make($request->password);
            if($request->image && $request->image!=null)
                $data['image']    = 'uploads/doctor/'.$this->saveImage($request->image,'uploads/doctor');

            $user = Doctor::create($data);

            $token = doctor_api()->login($user); // generate token
            $user = Doctor::where('id',$user->id)->first();
            $user->token = $token;

            PhoneToken::updateOrCreate([
                'doctor_id'=>$user->id ,
                'phone_token'=>$request->fcm_token,
                'type'=>'android',
            ]);

            return $this->apiResponse($user,'','simple');

        }catch (\Exception $ex){
            return $this->apiResponse($ex->getCode(),$ex->getMessage(),'simple','422');
        }

    }


    //===========================================
    public function profile(Request $request){
        $user = Doctor::where('id',doctor_api()->user()->id)->first();
        $user->token = getToken();
        return $this->apiResponse($user,'','simple');
    }
    //===========================================
    public function update_profile(Request $request){
        // validation
        $validator = Validator::make($request->all(),[
            'phone'=>'required|unique:users,phone,'.doctor_api()->user()->id.'|unique:doctors,phone,'.doctor_api()->user()->id,
            'email'=>'required|unique:users,email,'.doctor_api()->user()->id.'|unique:doctors,email,'.doctor_api()->user()->id,
            'name_ar' => 'required',
            'password' => 'required',
            'location_ar' => 'required',
            'gender' => 'required',
            'category_id' => 'required',
            'degree_id' => 'required',
        ]);
        if ($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),'simple','422');
        }
        $data = $request->except('fcm_token');
        if ($request->password && $request->password != null){
            $data['password'] = Hash::make($request->password);
        }
        if($request->image && $request->image!=null)
            $data['image']    = 'uploads/doctor/'.$this->saveImage($request->image,'uploads/doctor');
        $user = Doctor::where('id',doctor_api()->user()->id)->first();
//        if ( $request->image && $request->image != null )
//            $data['image'] = $this->saveImage($request->image,'uploads/user',$user->getAttributes()['image']);

        $user->update($data);
        $user->token =getToken();

        return $this->apiResponse($user,'','simple');

    }

    //=======================================================================================================
    public function logout(Request $request){
        $validator = Validator::make($request->all(), [ // <---
            'token' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null,$validator->errors(),'simple','422');
        }

        if (!\auth()->check())
        {
            return $this->apiResponse(null,'logout once or token is not valid','simple');
        }

        PhoneToken::where(['user_id' => doctor_api()->user()->id, 'phone_token' => $request->token])->delete();

        $token = getToken();
        if ($token != null){
            try {
                JWTAuth::setToken($token)->invalidate(); // logout user
                return $this->apiResponse(null,'logout done','simple');
            }catch(TokenInvalidException $e){
                return $this->apiResponse(null,'done','simple');
            }
        }
        else{
            return $this->apiResponse(null,'done','simple');
        }
    }
    //=======================================================================================================



}
