<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $appends =['name','location'];
    protected $guarded = [];

    public function getImageAttribute(){
        return  get_file($this->attributes['image']);
    }
    //===================  name ===========================
    public function getNameAttribute(){
        $name = $this->attributes['name_ar'];
        if (request()->header('lang') && request()->header('lang') != null)
            $name = $this->attributes['name_'.request()->header('lang')];
        elseif(request()->get('lang') && request()->get('lang') != null)
            $name = $this->attributes['name_'.request()->get('lang')];
        elseif(request()->lang && request()->lang != null)
            $name = $this->attributes['name_'.request()->lang];
        return $name;
    }
    //===================  location ===========================
    public function getLocationAttribute(){
        $location = $this->attributes['location_ar'];
        if (request()->header('lang') && request()->header('lang') != null)
            $location = $this->attributes['location_'.request()->header('lang')];
        elseif(request()->get('lang') && request()->get('lang') != null)
            $location = $this->attributes['location_'.request()->get('lang')];
        elseif(request()->lang && request()->lang != null)
            $location = $this->attributes['location_'.request()->lang];
        return $location;
    }
    //===========================================================
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    //===========================================================
    public function doctors(){
        return $this->hasMany(Doctor::class,'hospital_id');
    }

}
