<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HotelPackage;
use App\Models\HotelGallery;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\HotelPackageRequest;

class HotelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotel_packages = HotelPackage::paginate(10);

        return view('admin.hotel_packages.index', compact('hotel_packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hotel_packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HotelPackageRequest $request)
    {
        if($request->validated()) {
            $slug = Str::slug($request->location, '-');
            $hotel_package = HotelPackage::create($request->validated() + ['slug' => $slug ]);
        }

        return redirect()->route('admin.hotel_packages.edit', [$hotel_package])->with([
            'message' => 'Success Created !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HotelPackage $hotel_package)
    {
        $hotel_galleries = HotelGallery::paginate(10);

        return view('admin.hotel_packages.edit', compact('hotel_package','hotel_galleries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HotelPackageRequest $request, HotelPackage $hotel_package)
    {
        if($request->validated()) {
            $slug = Str::slug($request->location, '-');
            $hotel_package->update($request->validated() + ['slug' => $slug]);
        }

        return redirect()->route('admin.hotel_packages.index')->with([
            'message' => 'Success Updated !',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelPackage $hotel_package)
    {
        $hotel_package->delete();

        return redirect()->back()->with([
            'message' => 'Success Deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
