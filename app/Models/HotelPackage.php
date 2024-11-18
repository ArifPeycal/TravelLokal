<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelPackage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function hotel_galleries()
    {
        return $this->hasMany(HotelGallery::class);
    }
}
