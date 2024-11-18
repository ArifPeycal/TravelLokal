<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;

class CustomerReviewController extends Controller
{
    public function store(ReviewRequest $request)
    {
        $users = auth()->user(); // Get the authenticated user
    $users->reviews()->create($request->validated()); // Create the review
    $reviews = Review::with('user')->paginate();
    return redirect()->back()->with([ // Redirect back with multiple messages
        'message' => 'Review submitted successfully',
        'reviews' => $reviews,
    ]);
    }

    // public function show(CustomerReview $review)
    // {
    //     $reviews = Review::where('id', '!=', $review->id)->get();

    //     return view('reviews.show', compact('reviews'));
    // }

    public function show(CustomerReview $review)
{
    $users = auth()->user(); // Get the authenticated user
    $reviews = Review::with('user')->get();

    return view('reviews.show', compact('reviews', 'users'));
}
}
