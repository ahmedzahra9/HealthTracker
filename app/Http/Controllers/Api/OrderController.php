<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\OrderDetails;
use App\Models\Part;
use App\Models\PartType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /*================================================*/
    public function brands(Request $request){
        $validator = Validator::make($request->all(), [
            'sub_category_id' => 'required',
        ]);
        if ($validator->fails()) {
            return apiResponse(null, $validator->errors(), 422);
        }
        $brands = Brand::where('sub_category_id',$request->sub_category_id)->get();;
        return apiResponse($brands);
    }
    /*================================================*/
    public function parts(Request $request){
        $validator = Validator::make($request->all(), [
            'brand_id' => 'required',
        ]);
        if ($validator->fails()) {
            return apiResponse(null, $validator->errors(), 422);
        }
        $brand = $request->brand_id;
        $data = PartType::whereHas('parts',function ($query) use ($brand) {
            $query->where('brand_id',$brand);
        })->get();

        $data = $data->map(function($item) use ($brand) {
                $item['parts'] = Part::where(['type_id'=>$item['id'],'brand_id'=>$brand])->get();
                return $item;
        });
//        $data = Part::where('brand_id',$request->brand_id)->get();
        return apiResponse($data);
    }

    /*================================================*/
    public function store_order(Request $request)
    {
        //####################  start validation ###########################
        $validator = Validator::make($request->all(), [
            'structure_no'  => 'required',
            'phone'         => 'required',
            'brand_id'      => 'required|exists:brands,id',
//            'part_id'       => 'required|exists:parts,id',
        ]);
        if ($validator->fails()) {
            return apiResponse(null, $validator->errors(), 422);
        }

        $data = $request->only('structure_no', 'phone', 'brand_id', 'fix_no', 'total');
        $data['user_id'] = user_api()->user()->id;
        $order = Order::create($data);
        if ($request['details']){
            foreach ($request['details'] as $detail){
                $new_order_details = new OrderDetails;
                $new_order_details['order_id'] = $order['id'];
                $new_order_details['part_id']  = $detail['part_id'];
                $new_order_details->save();
            }
        }
        return apiResponse($order);
    }
    /*================================================*/
    public function update_order(Request $request)
    {
        //####################  start validation ###########################
        $validator = Validator::make($request->all(), [
            'order_id'      => 'required|exists:orders,id',
            'structure_no'  => 'required',
            'phone'         => 'required',
            'brand_id'      => 'required|exists:brands,id',
        ]);
        if ($validator->fails()) {
            return apiResponse(null, $validator->errors(), 422);
        }
        $data = $request->only('structure_no', 'phone', 'brand_id', 'fix_no', 'total');
        $order = Order::where('id', $request->order_id)->first();
        $order->update($data);

        OrderDetails::where('order_id', $order->id)->delete();
        if ($request['details']){
            foreach ($request['details'] as $detail){
                $new_order_details = new OrderDetails;
                $new_order_details['order_id'] = $order['id'];
                $new_order_details['part_id']  = $detail['part_id'];
                $new_order_details->save();
            }
        }
        return apiResponse($order);
    }

    /*================================================*/
    public function current_orders(Request $request){

        $order = Order::where(['user_id'=>user_api()->user()->id,'status'=>'new'])
            ->with('details.part.brand.sub_category.category')
            ->latest()->get();

        return apiResponse($order);
    }
    /*================================================*/
    public function previous_orders(Request $request){

        $order = Order::where(['user_id'=>user_api()->user()->id,'status'=>'ended'])
            ->with('details.part.brand.sub_category.category')
            ->latest()->get();

        return apiResponse($order);
    }


    /*================================================*/

}
