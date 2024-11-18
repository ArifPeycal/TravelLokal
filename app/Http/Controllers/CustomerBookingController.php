<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;

class CustomerBookingController extends Controller
{
    public function show()
    {
        $bookings = Booking::paginate();

        return view('booking', compact('bookings'));
    }
}
