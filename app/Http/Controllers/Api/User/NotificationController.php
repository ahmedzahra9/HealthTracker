<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\PaginateTrait;
use App\Models\Following;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    use PaginateTrait;
    public function notifications(){
        Following::where('user_id',user_api()->user()->id)->update(['checked'=>true]);
        $notifications = Following::where('user_id',user_api()->user()->id);
        return $this->apiResponse($notifications);
    }//end fun
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNotificationsCount()
    {
        $notificationsCount = Following::where('user_id',user_api()->user()->id)->where('checked',false)->count();
        return $this->apiResponse($notificationsCount,'','simple');
    }//end fun



}
