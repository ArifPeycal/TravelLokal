<?php

namespace App\Http\Controllers;

use App\Models\HotelBooking;
use Illuminate\Http\Request;
use App\Http\Requests\HotelBookingRequest;

class HotelBookingController extends Controller
{
    public function store(HotelBookingRequest $request)
    {
        HotelBooking::create($request->validated());

        return redirect()->back()->with([
            'message' => "Success, we'll process your booking"
        ]);
    }
}
