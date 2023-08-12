<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Doctor extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = [];
    protected $appends =['name','location'];

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
    public function degree(){
        return $this->belongsTo(Degree::class,'degree_id');
    }
    //===========================================================
    public function reservations(){
        return $this->hasMany(Reservation::class,'doctor_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}
