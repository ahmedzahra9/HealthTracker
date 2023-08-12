<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\PaginateTrait;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    use PaginateTrait;

    // validation
    public function store_reservation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 'simple', '422');
        }

        $data = $request->all();
        $data['user_id'] = user_api()->id() ?: '';
        $reservation = Reservation::create($data);

        $reservation = Reservation::with($this->reservation_relations())
            ->whereId($reservation->id)->first();

        return $this->apiResponse($reservation, '', 'simple');
    }

    //======================================================================
    public function reservations(Request $request)
    {

        $reservations = Reservation::with($this->reservation_relations())->where('user_id', user_api()->id())->orderBy('date','desc')->get();

        $days = ["Sat" => "السبت", "Sun" => "الاحد", "Mon" => "الاثنين", "Tue" => "الثلاثاء", "Wed" => "الاربعاء", "Thu" => "الخميس", "Fri" => "الجمعة"];
        $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
        $reservations = $reservations->map(function ($data) use ($months, $days) {
            $data['day_ar'] = $days[date('D', strtotime($data['date']))];
            $data['month_ar'] = $months[date("M", strtotime($data['date']))];
            return $data;
        });

        return $this->apiResponse($reservations , '' , 'simple');
    }
}
