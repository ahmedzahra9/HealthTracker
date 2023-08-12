<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Traits\PhotoTrait;
use App\Models\Desease;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Reservation;
use App\Models\ReservationReports;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    use PhotoTrait;
    public function index(Request $request , $id){
        if($id != null){
            $reservations = Reservation::where('user_id',$id)->get();
            $user = User::where('id',$id)->first();
        }else{
            $reservations = Reservation::where('user_id',auth()->user()->id)->get();
            $user = User::where('id',auth()->user()->id)->first();
        }
        $days = ["Sat" => "السبت", "Sun" => "الاحد", "Mon" => "الاثنين", "Tue" => "الثلاثاء", "Wed" => "الاربعاء", "Thu" => "الخميس", "Fri" => "الجمعة"];
//        $day_ar = $days[date('D',strtotime($request['date']))] ;
        $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
//        $month_ar = $months[date("M",strtotime($request['date']))];
//        $date =  date('Y-m-d',strtotime($request['date']));

        $reservations = $reservations->map(function($data) use ($months,$days){
//            $data['date'] = date('Y-m-d',strtotime($data['date']));
            $data['day_ar'] = $days[date('D',strtotime($data['date']))] ;
            $data['month_ar'] = $months[date("M",strtotime($data['date']))];
            return $data;
        });

        $user_id = $user->id;
        $reports = ReservationReports::whereHas('reservation',function ($query) use ($user_id){
             $query->where('user_id',$user_id);
        })->get();
        return view('Web.patient_profile', compact('reservations','user','reports'));
    }
    //================================================================

}
