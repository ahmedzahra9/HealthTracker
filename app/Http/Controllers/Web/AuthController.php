<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Traits\PhotoTrait;
use App\Models\Category;
use App\Models\Degree;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use PhotoTrait;

    public function register(){
        if (auth()->check() || auth()->guard('doctor')->check()){
            return redirect('/');
        }
        $categories = Category::all();
        $degrees = Degree::all();
        $hospitals = Hospital::all();
        return view('Web.register',compact('categories', 'degrees','hospitals'));
    }
    //===================================================================
    public function user_register(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email|unique:doctors,email',
            'name' => 'required',
            'phone' => 'required|unique:users,phone|unique:doctors,phone',
            'password' => 'required',
        ]);
        if ($validator->fails())
            return response()->json(['messages' => $validator->errors(), 'success' => 'false']);
        $data = $request->all();
//        return $data['phone'];
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $user->phone = $request->phone;
        $user->save();

        auth()->login($user);
        return response()->json(['message' =>'User added successfully','success'=>'true']);
    }
    //===================================================================
    public function doctor_register(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email|unique:doctors,email',
            'name_ar' => 'required',
            'phone' => 'required|unique:users,phone|unique:doctors,phone',
            'password' => 'required',
            'location_ar' => 'required',
            'gender' => 'required',
            'category_id' => 'required',
            'degree_id' => 'required',
//            'type' => 'required',
        ]);
        if ($validator->fails())
            return response()->json(['messages' => $validator->errors(), 'success' => 'false']);
        $data = $request->all();
//        return $data['phone'];
        $data['password'] = Hash::make($request->password);
        if($request->image && $request->image!=null)
            $data['image']    = 'uploads/doctor/'.$this->saveImage($request->image,'uploads/doctor');


        $user = Doctor::create($data);
//        $user->phone = $request->phone;
//        $user->save();

//        auth()->guard('doctor')->login($user);
        Auth::guard('doctor')->loginUsingId($user->id);
//        Auth::loginUsingId($user->id);

        return response()->json(['message' =>'Doctor added successfully','success'=>'true']);
    }
    //===================================================================
    public function user_login(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required',
        ]);
        if ($validator->fails()){
            return apiResponse(null,$validator->errors(),'422');
        }

        $credentials = ['email' => request('email'), 'password' => request('password'),'block' => 'no'];
        $user = User::where('email',$request->email)->count();
        $doctor = Doctor::where('email',$request->email)->count();
//        return $data;
        if ($user > 0){
            if (auth()->attempt($credentials))
                return response()->json(['message'=>'login successfully ','success'=>'true']);
            else
                return response()->json(['messages'=>['invalid credentials register please '],'success'=>'false']);
        }elseif ($doctor > 0){
            if ( doctor()->attempt($credentials))
                return response()->json(['message'=>'login successfully ','success'=>'true']);
            else
                return response()->json(['messages'=>['invalid credentials register please '],'success'=>'false']);
        }else{
            return response()->json(['messages'=>['invalid credentials register please '],'success'=>'false']);
        }
    }
    //===================================================================
    public function login(Request $request){
        if (auth()->check() || auth()->guard('doctor')->check()){
            return redirect('/');
        }else{
            return view('Web.login');
        }
    }

    //===================================================================
    public function post_login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email|exists:doctors,email',
            'password' => 'required',
        ]);
        if ($validator->fails())
            return response()->json(['messages' => $validator->errors(), 'success' => 'false']);
        $data = $request->all();
//        return $data['phone'];
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $user->phone = $request->phone;
        $user->save();

        auth()->login($user);
        return response()->json(['message' =>'User added successfully','success'=>'true']);
    }
    //===================================================================
    public function logout()
    {
        if (auth()->check()){
            auth()->logout();
        }elseif (doctor()->check()){
            doctor()->logout();
        }
        return redirect('login');
    }
    //===========================================
    public function update_profile(Request $request){
        // validation
        $validator = Validator::make($request->all(),[
            'email'=>'required|unique:users,email,'.\auth()->user()->id,
            'phone'=>'required|unique:users,phone,'.\auth()->user()->id,
            'name'=>'required'
        ]);
        if ($validator->fails()){
            return apiResponse(null,$validator->errors(),'422');
        }
        $data = $request->only('name','phone','email');
        if ($request->password && $request->password != null){
            $data['password'] = Hash::make($request->password);
        }
        $user = User::where('id',\auth()->user()->id)->first();
        $user->update($data);

        return response()->json([
            'message' => 'تم التعديل بنجاح',
            'success' => 'true'
        ]);
    }

}
