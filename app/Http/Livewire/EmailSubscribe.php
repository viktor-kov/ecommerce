<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EmailSubscription;

class EmailSubscribe extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|email',
    ];

    public function subscribe()
    {
        $this->validate();

        EmailSubscription::firstOrCreate(
            ['email' => $this->email]
        );

        $this->email = "";

        session()->flash('success', __('other.thankyou-for-subscribing'));
    }


    public function render()
    {
        return view('livewire.email-subscribe');
    }
}
