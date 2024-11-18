<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Models\HotelPackage;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $travel_packages = TravelPackage::with('galleries')->get();

        // return view('homepage', compact('travel_packages'));

        // Fetch both travel packages and hotel packages in a single query
        $travel_packages = TravelPackage::with('galleries')->get();
        $hotel_packages = HotelPackage::with('hotel_galleries')->get();

        // Pass both variables to the view
        return view('homepage', compact('travel_packages', 'hotel_packages'));
    }
}
