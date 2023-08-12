<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Order;
use App\Models\Part;
use App\Models\Reservation;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index(Request $request){

        $created_from = $request->created_from ? date('Y-m-d',strtotime($request->created_from)):date('2023-1-1');
        $created_to = $request->created_to ?date('Y-m-d' ,strtotime($request->created_to)):date('Y-m-d' );

        $chart_day_array = $chart_order_array = [];
        $chart_order_count = 0;

        for($i= 30 ; $i>=0 ; $i--){
            array_push($chart_day_array , (string)date('d/m',strtotime('-'.$i.'day') ) );
            $order = Reservation::whereDate('created_at' , date('Y-m-d',strtotime('-'.$i.'day') ))->count();
            $chart_order_count += $order;
            array_push($chart_order_array , (string)$order );
        }
        $total_income = Reservation::whereBetween('created_at',[date('Y-m-d',strtotime('-30day')  ),date('Y-m-d')])->count();
//        return $chart_order_array;

        $order_count = Reservation::whereBetween('created_at',[$created_from,$created_to])->count();
        $user_count = User::whereBetween('created_at',[$created_from,$created_to])->count();
        $doctor_count = Doctor::whereBetween('created_at',[$created_from,$created_to])->count();
        $hospital_count = Hospital::whereBetween('created_at',[$created_from,$created_to])->count();
        $admin_count = Admin::whereBetween('created_at',[$created_from,$created_to])->count();
        $contact_count = Contact::whereBetween('created_at',[$created_from,$created_to])->count();

        //****************************************************************
        $hospitals = Hospital::whereHas('doctors')->withCount('doctors')->get();
        return view('Admin.index',['created_from'=>$created_from,'created_to'=>$created_to],
            compact('chart_day_array','chart_order_array','chart_order_count' ,
                'order_count','user_count','admin_count','contact_count'
                ,'hospital_count','total_income','hospitals','doctor_count'
                ));

//        return view('Admin.index');
    }

    //###################################################


}
