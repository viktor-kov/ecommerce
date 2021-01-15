<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Storage;
use Laravel\Jetstream\Http\Controllers\Inertia\UserProfileController;

class UserAvatarController extends Controller
{

    public function update(Request $request)
    {
        $photo_path = $request->profile_photo_path;

        if($photo_path != 'default.jpg') {
            $delete_profile_photo = Storage::disk('public')->delete('avatars/'.$photo_path);
        }
       
        $user_id = auth()->user()->id;

        $original_name = $request->file('avatar')->getClientOriginalName();

        $extension = $request->file('avatar')->extension();

        $name = time().'_'.$user_id.'.'.$extension;

        $path = $request->file('avatar')->storeAs('avatars', $name, 'public');
        
        $update_avatar = User::where('id', $user_id)->update(['profile_photo_path' => $name ]);

        
        return back();
    }
}
