<?php

namespace App\Http\Controllers;

use App\Models\HotelBooking;
use Illuminate\Http\Request;

class CustomerHotelBookingController extends Controller
{
    public function show()
    {
        $hotel_bookings = HotelBooking::paginate();

        return view('hotel_booking', compact('hotel_bookings'));
    }
}
