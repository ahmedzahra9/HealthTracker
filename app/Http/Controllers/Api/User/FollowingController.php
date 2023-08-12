<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\PaginateTrait;
use App\Http\Traits\PhotoTrait;
use App\Models\Chat;
use App\Models\Following;
use App\Models\Reservation;
use App\Models\ReservationReports;
use App\Models\ReservationXRays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FollowingController extends Controller
{
    use PhotoTrait;
    use PaginateTrait;

    public function store_following(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'temp' => 'required',
            'heart' => 'required',
            'reservation_id' => 'required|exists:reservations,id',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 'simple', '422');
        }
        $reservation = Reservation::where('id', $request->reservation_id)->first();
        $data = $request->all();
        $data['user_id'] = $reservation->user_id;
        $data['doctor_id'] = $reservation->doctor_id;
        $following = Following::create($data);
        event(new \App\Events\following($request->reservation_id, $data['message'], $data['doctor_id'], $reservation['user']['name']));
        return $this->apiResponse($following, 'done', 'simple');

    }
    //=========================================================================
    public function chats(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reservation_id' => 'required|exists:reservations,id',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 'simple', '422');
        }
        $following = Chat::where('reservation_id',$request->reservation_id);
        return $this->apiResponse($following);
    }
    //=========================================================================
    public function send_chat(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required',
            'reservation_id' => 'required|exists:reservations,id',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 'simple', '422');
        }
        $reservation = Reservation::where('id', $request->reservation_id)->first();
        $data = $request->all();
        $data['user_id'] = $reservation->user_id;
        $data['doctor_id'] = $reservation->doctor_id;
        $data['sender_type'] = 'user' ;
        $chat = Chat::create($data);

        event(new \App\Events\chat($request->reservation_id, $data['message'], $data['sender_type']));

        event(new \App\Events\chatDoctor($request->reservation_id, $data['doctor_id'], $reservation['user']['name'], $data['message']));

        return $this->apiResponse($chat, 'done', 'simple');

    }

    //=========================================================================
    public function store_reservation_xray(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reservation_id' => 'required|exists:reservations,id',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 'simple', '422');
        }
        $reservation_id = $request->reservation_id;
        foreach ($request->images as $image) {
            if ($image) {
                $image = 'uploads/reservation_xray/' . $this->saveImage($image, 'uploads/reservation_xray');
                ReservationXRays::create([
                    'reservation_id' => $reservation_id,
                    'image' => $image
                ]);
            }
        }
        $res = ReservationXRays::where('reservation_id',$reservation_id);
        return $this->apiResponse($res);

    }

    //=========================================================================

}
