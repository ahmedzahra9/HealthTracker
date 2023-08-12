<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationReports extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'reservation_reports';

    public function getImageAttribute(){
        return  get_file($this->attributes['image']);
    }

    public function reservation(){
        return $this->belongsTo(Reservation::class,'reservation_id');
    }

}
