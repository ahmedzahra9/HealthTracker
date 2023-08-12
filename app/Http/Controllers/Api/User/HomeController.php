<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\PaginateTrait;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use PaginateTrait;
    public function slider(){
        $data = Slider::query();
        return $this->apiResponse($data);
    }
    //================================================================

    public function all_categories(Request $request){
       $data = Category::query();
        return $this->apiResponse($data);
    }
    //================================================================
    public function category_search(Request $request){
       $data = Category::where('name_ar','like','%' .$request->name. '%')
           ->orWhere('name_en','like','%' .$request->name. '%');
        return $this->apiResponse($data);
    }
    //================================================================
}
