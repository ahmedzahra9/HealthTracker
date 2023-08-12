<?php

use App\freelance;
use App\order;
use Illuminate\Support\Facades\Storage;

if (!function_exists('setting')) {
    function setting()
    {
        return \App\Models\Setting::orderBy('id', 'desc')->first();
    }
}

// ============================================================
if (!function_exists('aurl')) {
    function aurl($url = null)
    {
        return url('admin/' . $url);
    }
}

// ============================================================
if (!function_exists('admin')) {
    function admin()
    {
        return auth()->guard('admin');
    }
}
// ============================================================
if (!function_exists('user_api')) {
    function user_api()
    {
        return auth()->guard('user_api');
    }
}
// ============================================================
if (!function_exists('doctor')) {
    function doctor()
    {
        return auth()->guard('doctor');
    }
}
// ============================================================
if (!function_exists('doctor_api')) {
    function doctor_api()
    {
        return auth()->guard('doctor_api');
    }
}

// ============================================================
if (!function_exists('get_file')) {
    function get_file($file)
    {
        if (!is_null($file))
            return asset($file);
        else
            return asset('Admin/imgs/default.jpg');

    }
}
//===================  toaster ===========================
if (!function_exists('my_toaster')) {
    function my_toaster($message = 'تم بنجاح',$alert_type = 'success') {
        session()->flash('message', $message);
        session()->flash('type', $alert_type);
    }
}
//===================  apiResponse ===========================
if (!function_exists('apiResponse')) {
    function apiResponse($data = '',$message = '',$code = 200,$status = '200') {
        return response()->json(['data'=>$data,'message'=>$message,'code'=>intval($code)],$status);
    }
}

//===================  getToken ===========================
if (!function_exists('getToken')) {
    function getToken() {
        $token = null;
        if (request()->header('auth_token') && request()->header('auth_token') != null)
            $token = request()->header('auth_token');
        elseif(request()->get('auth_token') && request()->get('auth_token') != null)
            $token = request()->get('auth_token');
        elseif(request()->auth_token && request()->auth_token != null)
            $token = request()->auth_token;
        return $token;
    }
}

