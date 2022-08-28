<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function booked(){
    return $this->belongsTo(Resort::class, 'resort_id', 'booking_id');
    }
}
