<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Models\Review;

class TravelPackageController extends Controller
{
    public function index()
    {
        $travel_packages = TravelPackage::with('galleries')->get();

        return view('travel_packages.index', compact('travel_packages'));
    }

    public function show(TravelPackage $travel_package)
    {
        $travel_packages = TravelPackage::where('id', '!=', $travel_package->id)->get();

        $reviews = Review::with('user')->get();

        return view('travel_packages.show', compact('travel_package', 'travel_packages', 'reviews'));

    }
}
