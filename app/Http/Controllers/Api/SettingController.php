<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function setting(){
        $setting = Setting::first();
        $setting->terms_link = url('terms');
        return apiResponse($setting);
    }

}
