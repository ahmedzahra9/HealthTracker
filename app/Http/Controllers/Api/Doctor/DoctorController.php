<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\PaginateTrait;
use App\Models\Category;
use App\Models\Doctor;
use App\Models\Favourate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    use PaginateTrait;
    public function index(Request $request){
        $validator = Validator::make($request->all(),[
            'category_id'=>'exists:categories,id',
        ]);
        if ($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),'simple','422');
        }
        $categories = $request->category_id?[$request->category_id]:Category::pluck('id')->toArray();
        $doctors = Doctor::with('category')->whereIn('category_id',$categories)
            ->where('type','!=','hospital');
        if ($request->name)
            $doctors = $doctors->where('name_ar','like','%' .$request->name. '%');
        if ($request->rate && $request->rate!= 'null')
            $doctors = $doctors->orderBy('rating',$request->rate);
        if ($request->price && $request->price!= 'null')
            $doctors = $doctors->orderBy('price','asc');
        if ($request->location_ar && $request->location_ar != 'null')
            $doctors = $doctors->orderBy('location_ar',$request->location_ar);

        return $this->apiResponse($doctors);
    }
    //=======================================================
    public function one_doctor(Request $request){
        $validator = Validator::make($request->all(),[
            'id'=>'required|exists:doctors,id',
        ]);
        if ($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),'simple','422');
        }
        $doctor = Doctor::with('category')->where('id',$request->id)->first();
        return $this->apiResponse($doctor,'','simple');
    }
    //=======================================================

}
