<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class PasswordUpdate extends Component
{
    public $current_password;
    public $new_password;
    protected $user;

    protected $rules = [
        'current_password' => 'required',
        'new_password' => 'required|min:8'
    ];

    public function passwordUpdate() {
        $this->validate();

        $this->user = auth()->user();

        if(! Hash::check($this->current_password, $this->user->password)) {
            $this->addError('current_password', __('passwords.bad-password'));
            
            $this->current_password = "";
            $this->new_password = "";
        }
        else {
            //update the password
            $this->user->fill([
                'password' => Hash::make($this->new_password)
            ])->save();

            session()->flush();
            
            return redirect()->route('login');
        }
    }


    public function render()
    {
        return view('livewire.password-update');
    }
}
