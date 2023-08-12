<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImageAttribute(){
        return  get_file($this->attributes['image']);
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
    public function hospital(){
        return $this->belongsTo(Hospital::class,'hospital_id');
    }
    public function chats(){
        return $this->hasMany(Chat::class,'reservation_id');
    }
    public function not_checked_chats(){
        return $this->hasMany(Chat::class,'reservation_id')->where('checked', 0);
    }
    public function follows(){
        return $this->hasMany(Following::class,'reservation_id');
    }
    public function not_checked_follows(){
        return $this->hasMany(Following::class,'reservation_id')->where('checked', 0);
    }
    public function x_rays(){
        return $this->hasMany(ReservationXRays::class,'reservation_id');
    }
    public function reports(){
        return $this->hasMany(ReservationReports::class,'reservation_id');
    }
}
