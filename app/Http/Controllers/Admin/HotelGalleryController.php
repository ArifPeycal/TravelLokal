<?php

namespace App\Http\Controllers\Admin;

use App\Models\HotelGallery;
use Illuminate\Http\Request;
use App\Models\HotelPackage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\HotelGalleryRequest;

class HotelGalleryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(HotelGalleryRequest $request, HotelPackage $hotel_package)
    {
        if($request->validated()){
            $images = $request->file('images')->store(
                'hotel_package/gallery', 'public'
            );
            HotelGallery::create($request->except('images') + ['images' => $images,'hotel_package_id' => $hotel_package->id]);
        }

        return redirect()->route('admin.hotel_packages.edit', [$hotel_package])->with([
            'message' => 'Success Created !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HotelPackage $hotel_package,HotelGallery $hotel_gallery)
    {
        return view('admin.hotel_galleries.edit', compact('hotel_package','hotel_gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HotelGalleryRequest $request,HotelPackage $hotel_package, HotelGallery $hotel_gallery)
    {
        if($request->validated()) {
            if($request->images) {
                File::delete('storage/'. $hotel_gallery->images);
                $images = $request->file('images')->store(
                    'hotel_package/gallery', 'public'
                );
                $hotel_gallery->update($request->except('images') + ['images' => $images, 'hotel_package_id' => $hotel_package->id]);
            }else {
                $hotel_gallery->update($request->validated());
            }
        }

        return redirect()->route('admin.hotel_packages.edit', [$hotel_package])->with([
            'message' => 'Success Updated !',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelPackage $hotel_package,HotelGallery $hotel_gallery)
    {
        File::delete('storage/'. $hotel_gallery->images);
        $hotel_gallery->delete();

        return redirect()->back()->with([
            'message' => 'Success Deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
