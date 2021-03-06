<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordUpdateRequest;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function passwordUpdate(PasswordUpdateRequest $request)
    {
        //get the user
        $user = auth()->user();

        //check if the current_password filled in profile is the same as when the user registered, if not, redirect to profile page
        //if yes, than redirect to home.index
        if(! Hash::check($request->current_password, $user->password)) {
            return redirect()->route('profile')->with('error', __('passwords.bad-password'));
        }
        else {
            //update the password
            $request->user()->fill([
                'password' => Hash::make($request->new_password)
            ])->save();
        }

        return redirect()->route('profile')->with('success', __('passwords.password-changed'));
    }
}
