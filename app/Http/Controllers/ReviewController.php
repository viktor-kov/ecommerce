<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewStoreRequest;
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

    //deleting the review
    public function reviewDelete($id) {
        Review::where('id', $id)->delete();

        return back()->with('success', __('review.review-deleted'));
    }
}
