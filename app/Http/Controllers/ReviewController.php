<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //showing all reviews, joinig them on users table to be able to display the name of the author and paginating them
    public function reviewIndex() {

        $reviews = Review::join('users', 'reviews.user_id', '=', 'users.id')
                ->select('reviews.user_id','reviews.id','reviews.text', 'reviews.created_at', 'users.name')
                ->paginate(10);

        return view('admin.reviews', [
            'reviews' => $reviews,
        ]);
    }

    //storing the review = for one product we can have only one review (each user)
    public function reviewStore(Request $request) {
        $user_id = auth()->user()->id;
        Review::firstOrCreate([
            'product_id' => $request->product_id,
            'user_id' => $user_id,
        ],[
            'text' => $request->review_text,
        ]);

        return back()->with('success', __('review.review-added'));
    }

    //deleting the review
    public function reviewDelete($id) {
        Review::where('id', $id)->delete();

        return back()->with('success', __('review.review-deleted'));
    }
}
