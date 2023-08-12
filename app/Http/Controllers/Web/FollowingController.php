<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Traits\PhotoTrait;
use App\Models\Chat;
use App\Models\Following;
use App\Models\Reservation;
use App\Models\ReservationReports;
use App\Models\ReservationXRays;
use Illuminate\Http\Request;

class FollowingController extends Controller
{
    use PhotoTrait;

    public function index($id)
    {
        $reservation = Reservation::where('id', $id)->first();

        foreach ($reservation->not_checked_chats as $chat) {
            if ($chat->sender_type == 'doctor' && $chat->checked == 0 && auth()->check()) {
                $chat->checked = 1;
                $chat->save();
            } elseif ($chat->sender_type == 'user' && $chat->checked == 0 && doctor()->check()) {
                $chat->checked = 1;
                $chat->save();
            }
        }
        foreach ($reservation->not_checked_follows as $follow) {
            $follow->checked = 1;
            $follow->save();
        }

        return view('Web.following', compact('reservation'));
    }

    public function store_following(Request $request)
    {
//        return $request->all();
        $reservation = Reservation::where('id', $request->reservation_id)->first();
        $data = $request->all();
        $data['user_id'] = $reservation->user_id;
        $data['doctor_id'] = $reservation->doctor_id;
        Following::create($data);
        event(new \App\Events\following($request->reservation_id, $data['message'], $data['doctor_id'], $reservation['user']['name']));
        return response()->json([
            'message' => 'تم الارسال بنجاح',
            'success' => 'true'
        ]);
    }

    //=========================================================================
    public function send_chat(Request $request)
    {
        $reservation = Reservation::where('id', $request->reservation_id)->first();
        $data = $request->all();
        $data['user_id'] = $reservation->user_id;
        $data['doctor_id'] = $reservation->doctor_id;
        $data['sender_type'] = auth()->check() ? 'user' : 'doctor';
        Chat::create($data);

        event(new \App\Events\chat($request->reservation_id, $data['message'], $data['sender_type']));
        if (doctor()->check())
            event(new \App\Events\chatUser($request->reservation_id, $data['user_id'], $reservation['doctor']['name'], $data['message']));
        else
            event(new \App\Events\chatDoctor($request->reservation_id, $data['doctor_id'], $reservation['user']['name'], $data['message']));

        return response()->json([
//            'message'=>'sent successfully',
            'success' => 'true'
        ]);
    }

    //=========================================================================
    public function store_reservation_xray(Request $request)
    {
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

        return response()->json([

            'message' => 'تم الارسال بنجاح',
            'success' => 'true'
        ]);
    }

    //=========================================================================
    public function store_reservation_report(Request $request)
    {
        $reservation_id = $request->reservation_id;
        foreach ($request->images as $image) {
            if ($image) {
                $image = 'uploads/reservation_xray/' . $this->saveImage($image, 'uploads/reservation_xray');
                ReservationReports::create([
                    'reservation_id' => $reservation_id,
                    'image' => $image
                ]);
            }
        }
        return response()->json([
            'message' => 'تم الارسال بنجاح',
            'success' => 'true'
        ]);
    }
    //=========================================================================
}
