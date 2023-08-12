<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Doctor;
use App\Models\Reservation;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request){
        $all_categories = Category::all();
        $selected_category = $request->category_id ? : '';
        $selected_price = $request->price ? : '';
        $selected_rate = $request->rate ? : '';
        $selected_location_ar = $request->location_ar ? : '';
        $categories = $request->category_id?[$request->category_id]:Category::pluck('id')->toArray();
        $doctors = Doctor::whereIn('category_id',$categories)
            ->where('type','!=','hospital');
        if ($request->rate && $request->rate!= 'null')
            $doctors = $doctors->orderBy('rating',$request->rate);
        if ($request->price && $request->price!= 'null')
            $doctors = $doctors->orderBy('price','asc');
        if ($request->location_ar && $request->location_ar != 'null')
            $doctors = $doctors->orderBy('location_ar',$request->location_ar);

        $doctors = $doctors->take(20)->get();
        return view('Web.doctors',compact('doctors',
            'selected_category','all_categories','selected_price','selected_rate','selected_location_ar'));
    }

    //===========================================================================
    public function doctor_profile($id){
        $data = $this->reservations_helper($id);
        $doctor         = $data['doctor'];
        $reservations   = $data['reservations'];
        $dates          = $data['dates'];
        return view('Web.doctor_profile',compact('doctor','dates','reservations'));
    }
    //===========================================================================
    public function doctor_reservations(){
        $data = $this->reservations_helper(doctor()->id());
        $doctor         = $data['doctor'];
        $reservations   = $data['reservations'];
        $dates          = $data['dates'];
        return view('Web.my_appointments',compact('doctor','dates','reservations'));
    }
    //===========================================================================
    public function reservations_helper($id)
    {
        $doctor = Doctor::where('id',$id)->first();
        $dates = [];
        $days = ["Sat" => "السبت", "Sun" => "الاحد", "Mon" => "الاثنين", "Tue" => "الثلاثاء", "Wed" => "الاربعاء", "Thu" => "الخميس", "Fri" => "الجمعة"];
        $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
        for ($i=0; $i<14;$i++){
            $reservation_count = Reservation::where('date',date('Y-m-d',strtotime('+' . $i . ' days') ))
                ->where('doctor_id',$id)
                ->whereIn('status',['new','accepted'])
                ->count();
            if ($reservation_count < $doctor->day_limit){
                $my_date =  date('d',strtotime('+' . $i . ' days'));
                $dates[$i]['full_date'] =  date('Y-m-d',strtotime('+' . $i . ' days'));
                $dates[$i]['day_number'] =  $my_date;
                $dates[$i]['day_ar'] = $days[date('D',strtotime('+' . $i . ' days'))] ;
                $dates[$i]['month_ar'] = $months[date("M",strtotime('+' . $i . ' days'))];
            }
        }
        $reservations = Reservation::where('doctor_id',$id)->get();

        $reservations = $reservations->map(function($data) use ($months,$days){
//            $data['date'] = date('Y-m-d',strtotime($data['date']));
            $data['day_ar'] = $days[date('D',strtotime($data['date']))] ;
            $data['month_ar'] = $months[date("M",strtotime($data['date']))];
            return $data;
        });
        return [
            'doctor'        => $doctor,
            'reservations'  => $reservations,
            'dates'         => $dates,
        ];
    }
}
