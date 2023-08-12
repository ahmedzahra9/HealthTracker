<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationXRays extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'reservation_x_rays';

    public function getImageAttribute(){
        return  get_file($this->attributes['image']);
    }

}
