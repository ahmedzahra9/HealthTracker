<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Reservation;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index(Request $request){
        $all_categories = Category::all();
        $selected_category = $request->category_id ? : '';
        $selected_price = $request->price ? : '';
        $selected_rate = $request->rate ? : '';
        $selected_location_ar = $request->location_ar ? : '';
        $categories = $request->category_id?[$request->category_id]:Category::pluck('id')->toArray();
        $hospitals = Hospital::whereIn('category_id',$categories);
        if ($request->rate && $request->rate!= 'null')
            $hospitals = $hospitals->orderBy('rating',$request->rate);
        if ($request->price && $request->price!= 'null')
            $hospitals = $hospitals->orderBy('price','asc');
        if ($request->location_ar && $request->location_ar != 'null')
            $hospitals = $hospitals->orderBy('location_ar',$request->location_ar);

        $hospitals = $hospitals->paginate(20);
        return view('Web.hospitals',compact('hospitals',
            'selected_category','all_categories','selected_price','selected_rate','selected_location_ar'));
    }
    //===========================================================================
    public function hospital_profile($id){
        $hospital = Hospital::where('id',$id)->first();
        $dates = [];
        $days = ["Sat" => "السبت", "Sun" => "الاحد", "Mon" => "الاثنين", "Tue" => "الثلاثاء", "Wed" => "الاربعاء", "Thu" => "الخميس", "Fri" => "الجمعة"];
        $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
        for ($i=0; $i<14;$i++){
            $reservation_count = Reservation::where('date',date('Y-m-d',strtotime('+' . $i . ' days') ))
                ->where('hospital_id',$id)
                ->whereIn('status',['new','accepted'])
                ->count();
            if ($reservation_count < $hospital->day_limit){
                $my_date =  date('d',strtotime('+' . $i . ' days'));
                $dates[$i]['full_date'] =  date('Y-m-d',strtotime('+' . $i . ' days'));
                $dates[$i]['day_number'] =  $my_date;
                $dates[$i]['day_ar'] = $days[date('D',strtotime('+' . $i . ' days'))] ;
                $dates[$i]['month_ar'] = $months[date("M",strtotime('+' . $i . ' days'))];
            }
        }
        return view('Web.hospital_profile',compact('hospital','dates'));
    }
}
