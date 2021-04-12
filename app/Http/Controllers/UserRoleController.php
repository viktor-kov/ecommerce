<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRoleUpdateRequest;
use App\Models\User;

class UserRoleController extends Controller
{
    public function updateUserRole(UserRoleUpdateRequest $request) {
        
        if($request['role'] == 0 || $request['role'] == 1 ) {
            $id = $request->id;
            $role = $request->role;

            $update_user = User::where('id', $id)->update(['current_team_id' => $role]);
    
            return back()->with('success', __('admin.user-role-updated'));
        }

        return back();
    }
}
