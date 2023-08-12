<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Traits\PhotoTrait;
use App\Models\Desease;
use App\Models\Doctor;
use App\Models\Following;
use App\Models\Hospital;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    use PhotoTrait;
    public function index(Request $request){
        $validator = Validator::make($request->all(),[
            'date'=>'required',
        ]);
        if ($validator->fails()){
            my_toaster($validator->errors()->get('date')[0],'error');
            return redirect()->back();
        }
        $days = ["Sat" => "السبت", "Sun" => "الاحد", "Mon" => "الاثنين", "Tue" => "الثلاثاء", "Wed" => "الاربعاء", "Thu" => "الخميس", "Fri" => "الجمعة"];
        $day_ar = $days[date('D',strtotime($request['date']))] ;
        $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
        $month_ar = $months[date("M",strtotime($request['date']))];
        $date =  date('Y-m-d',strtotime($request['date']));
        $doctor = Doctor::where('id',$request['doctor_id'])->first();
        $hospital = Hospital::where('id',$request['hospital_id'])->first();
        $diseases = Desease::all();
        $type = $request['doctor_id']?'doctor':'hospital';
        return view('Web.confirm-serve',
            compact('day_ar', 'month_ar','date','doctor','hospital','diseases','type'));
    }
    //================================================================
    public function store_reservation(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'age'=>'required',
        ]);
        if ($validator->fails()){
            return response()->json(['messages' => $validator->errors(), 'success' => 'false']);
        }
        $data = $request->all();
        $data['user_id'] = auth()->user()->id?:'';
        if($request->image && $request->image!=null)
            $data['image']    = 'uploads/reservation/'.$this->saveImage($request->image,'uploads/reservation');

        $reservation = Reservation::create($data);

        $fol_data['reservation_id'] = $reservation->id;
        $fol_data['user_id'] = $reservation->user_id;
        $fol_data['doctor_id'] = $reservation->doctor_id;
        $fol_data['message'] = 'لديك حجز جديد';
        Following::create($fol_data);

        $url = route('patient_profile',auth()->user()->id);
        return response()->json([
            'message'=>'Reservation done successfully',
            'url'=>$url,
            'success'=>'true'
        ]);
    }
}
