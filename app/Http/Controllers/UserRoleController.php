<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRoleUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function update(UserRoleUpdateRequest $request) {
        
        if($request['role'] == 0 || $request['role'] == 1 ) {
            $id = $request->id;
            $role = $request->role;

            $update_user = User::where('id', $id)->update(['current_team_id' => $role]);
    
            return back();
        }

        return back();
    }
}
