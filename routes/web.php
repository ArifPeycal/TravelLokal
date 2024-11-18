<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['register' => true]);

Route::group(['middleware' => ['is_admin','auth'], 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // booking
    Route::resource('bookings', \App\Http\Controllers\Admin\BookingController::class)->only(['index', 'destroy']);
    // hotel booking
    Route::resource('hotel_bookings', \App\Http\Controllers\Admin\HotelBookingController::class)->only(['index', 'destroy']);
    // travel packages
    Route::resource('travel_packages', \App\Http\Controllers\Admin\TravelPackageController::class)->except('show');
    Route::resource('travel_packages.galleries', \App\Http\Controllers\Admin\GalleryController::class)->except(['create', 'index','show']);
    // hotel packages
    Route::resource('hotel_packages', \App\Http\Controllers\Admin\HotelPackageController::class)->except('show');
    Route::resource('hotel_packages.hotel_galleries', \App\Http\Controllers\Admin\HotelGalleryController::class)->except(['create', 'index','show']);

    // // profile
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
// travel packages
Route::get('travel-packages',[\App\Http\Controllers\TravelPackageController::class, 'index'])->name('travel_package.index');
Route::get('travel-packages/{travel_package:slug}',[\App\Http\Controllers\TravelPackageController::class, 'show'])->name('travel_package.show');
// hotel packages
Route::get('hotel-packages',[\App\Http\Controllers\HotelPackageController::class, 'index'])->name('hotel_package.index');
Route::get('hotel-packages/{hotel_package:slug}',[\App\Http\Controllers\HotelPackageController::class, 'show'])->name('hotel_package.show');
// contact
Route::get('contact', function() {
    return view('contact');
})->name('contact');
// booking
Route::post('booking', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
// hotel booking
Route::post('hotel_booking', [App\Http\Controllers\HotelBookingController::class, 'store'])->name('hotel_booking.store');
//customer dashboard
Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('user', [\App\Http\Controllers\UserController::class, 'customer'])->name('userprofile.index');
Route::get('profile', [\App\Http\Controllers\CustomerProfileController::class, 'show'])->name('customer_profile.show');
Route::put('profile', [\App\Http\Controllers\CustomerProfileController::class, 'update'])->name('customer_profile.update');
Route::get('bookings', [\App\Http\Controllers\CustomerBookingController::class, 'show'])->name('bookings.show');
Route::get('hotel_bookings', [\App\Http\Controllers\CustomerHotelBookingController::class, 'show'])->name('hotel_bookings.show');
Route::get('reviews', [\App\Http\Controllers\CustomerReviewController::class, 'show'])->name('reviews.show');
Route::post('reviews', [\App\Http\Controllers\CustomerReviewController::class, 'store'])->name('reviews.store');

