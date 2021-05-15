<?php

namespace App\Http\Livewire;

use App\Models\Review;
use Livewire\Component;

class AddNewReview extends Component
{
    public $reviews;
    public $showed_product;
    public $review_text;

    protected $rules = [
        'review_text' => 'required|min:5',
    ];

    public function addReview() {
        $this->validate();

        $user_id = auth()->user()->id;

        Review::create([
            'product_id' => $this->showed_product->id,
            'user_id' => $user_id,
            'text' => $this->review_text,
        ]);

        $this->reset('review_text');

        session()->flash('added-review', __('review.review-added'));
    }

    public function render()
    {
        $reviews = Review::where('product_id', $this->showed_product->id)
            ->join('users', 'reviews.user_id', '=', 'users.id')
            ->select('reviews.text', 'reviews.id', 'reviews.created_at', 'users.name')
            ->latest()
            ->get();

        $this->reviews = $reviews;

        return view('livewire.add-new-review');
    }
}
