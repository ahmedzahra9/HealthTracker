<?php

namespace App\Http\Controllers\Api\Doctor;

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

    public function following(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reservation_id' => 'required|exists:reservations,id',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 'simple', '422');
        }
        $following = Following::where('reservation_id',$request->reservation_id);
        return $this->apiResponse($following);
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
        $data['sender_type'] = 'doctor' ;
        $chat = Chat::create($data);

        event(new \App\Events\chat($request->reservation_id, $data['message'], $data['sender_type']));

        event(new \App\Events\chatUser($request->reservation_id, $data['user_id'], $reservation['doctor']['name'], $data['message']));

        return $this->apiResponse($chat, 'done', 'simple');

    }

    //=========================================================================
    public function get_reservation_xray(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reservation_id' => 'required|exists:reservations,id',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 'simple', '422');
        }
        $following = ReservationXRays::where('reservation_id',$request->reservation_id);
        return $this->apiResponse($following);

    }

    //=========================================================================
    public function store_reservation_report(Request $request)
    {
        $reservation_id = $request->reservation_id;
        foreach ($request->images as $image) {
            if ($image) {
                $image = 'uploads/reservation_report/' . $this->saveImage($image, 'uploads/reservation_report');
                ReservationReports::create([
                    'reservation_id' => $reservation_id,
                    'image' => $image
                ]);
            }
        }
        $following = ReservationReports::where('reservation_id',$request->reservation_id);
        return $this->apiResponse($following);

    }
    //=========================================================================
}
