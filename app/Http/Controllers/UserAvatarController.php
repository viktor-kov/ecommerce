<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AvatarUpdateRequest;
use Laravel\Jetstream\Http\Controllers\Inertia\UserProfileController;

class UserAvatarController extends Controller
{

    //update user avatar
    public function update(AvatarUpdateRequest $request)
    {
        //getting the users profile photo name
        $profile_photo_path = auth()->user()->profile_photo_path;

        //if the profile photo is not the default, the we want to delete the old profile photo from avatars folder
        if($profile_photo_path != 'default.jpg') {
            $delete_avatar = Storage::disk('public')->delete('avatars/'.$profile_photo_path);
        }

        $user_id = auth()->user()->id;
        //creating the new photo name with .jpg extension
        $name = time().'_'.$user_id.'.jpg';
      
        //creating the image from form input
        $img = Image::make($request->file('avatar'));
        
        //resizing the photo with sizes 300x300 and saving to img\avatars\name_of_new_photo
        $img->resize(300, 300)->save('img/avatars/'.$name);
        
        //updating the photoname in db
        $update_avatar = User::where('id', $user_id)->update(['profile_photo_path' => $name ]);

        return redirect()->route('profile')->with('success', __('profile.new-avatar'));
    }
}
