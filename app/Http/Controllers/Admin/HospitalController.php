<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\PhotoTrait;
use App\Models\Category;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class HospitalController extends Controller
{
    use PhotoTrait;
    public function index(Request $request)
    {
        if ($request->ajax()){
            $hospitals =Hospital::with('category')->latest()->get();

            return Datatables::of($hospitals)
                ->addColumn('action', function ($hospital) {
                    if(in_array(7,admin()->user()->permission_ids)) {
                        return '
                        <button  id="editBtn" class="btn btn-default btn-primary btn-sm mb-2  mb-xl-0 "
                             data-id="' . $hospital->id . '" ><i class="fa fa-edit text-white"></i>
                        </button>
                             <a class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $hospital->id . '" ><i class="fa fa-trash-o text-white"></i></a>
                       ';
                    }
                })

                ->editColumn('image',function ($hospital){
                    return '<img alt="image" class="img list-thumbnail border-0" style="width:100px;border-radius:10px" onclick="window.open(this.src)" src="'.$hospital->image.'">';
                })
                ->addColumn('checkbox' , function ($hospital){
                    return '<input type="checkbox" class="sub_chk" data-id="'.$hospital->id.'">';
                })
                ->addColumn('category' , function ($hospital){
                    return $hospital->category?$hospital->category->name_ar:'';
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.Hospital.index');
    }
    ################ Add Object #################
    public function create()
    {
        $categories = Category::all();
        return view('Admin.Hospital.parts.create',compact('categories'))->render();
    }

    public function store(Request $request)
    {
        $valedator = Validator::make($request->all(), [
            'name_ar'=>'required',
            'image'=>'required',
            'email'=>'required',
            'category_id'=>'required',
            'location_ar'=>'required',
            'description'=>'required',
        ]);
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        if ($request->image && $request->image != null)
            $data['image']    = 'uploads/Hospital/'.$this->saveImage($request->image,'uploads/Hospital');
        Hospital::create($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم الاضافة بنجاح'
            ]);
    }
    ################ Edit Hospital #################
    public function edit(Hospital $hospital)
    {
        $categories = Category::all();
        return view('Admin.Hospital.parts.edit', compact('hospital','categories'));
    }
    ################ update Hospital #################
    public function update(Request $request, Hospital $hospital)
    {
        $valedator = Validator::make($request->all(), [
            'name_ar'=>'required',
            'email'=>'required',
            'category_id'=>'required',
            'location_ar'=>'required',
            'description'=>'required',
        ]);
        if ($valedator->fails())
            return response()->json(['messages' => $valedator->errors()->getMessages(), 'success' => 'false']);

        $data = $request->all();
        if ($request->image && $request->image != null)
            $data['image']    = 'uploads/Hospital/'.$this->saveImage($request->image,'uploads/Hospital');
        $hospital->update($data);

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم التعديل بنجاح '
            ]);
    }
    ################ multiple Hospital  #################
    public function multiDelete(Request $request)
    {
        $ids = explode(",", $request->ids);
        Hospital::whereIn('id', $ids)->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }
    ################ Delete Hospital #################
    public function destroy(Hospital $hospital)
    {
        $hospital->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

}
