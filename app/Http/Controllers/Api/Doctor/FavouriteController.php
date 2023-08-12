<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\PaginateTrait;
use App\Models\Doctor;
use App\Models\Favourate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FavouriteController extends Controller
{
    use PaginateTrait;
    public function index(Request $request){
        $data = Favourate::with('doctor')->where('user_id',user_api()->user()->id);
        return $this->apiResponse($data);
    }
    //=======================================================

    public function add_delete_favourite(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'doctor_id'=>'required|exists:doctors,id',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 'simple', '422');
        }
        $data = $request->only('doctor_id');
        $data['user_id'] = user_api()->user()->id;
        $favourite = Favourate::where($data);

        if ($favourite->count()>0){
            $favourite->delete();
        }else{
            Favourate::create($data);
        }

        return $this->apiResponse(null, 'done', 'simple');
    }
    //=======================================================
}
