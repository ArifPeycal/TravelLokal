<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBooking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function hotel_package()
    {
        return $this->belongsTo(HotelPackage::class);
    }
}
