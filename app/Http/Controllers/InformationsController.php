<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInformationRequest;
use App\Models\Informations;
use Illuminate\Http\Request;

class InformationsController extends Controller
{



    public function store(StoreInformationRequest $request) {

        //if we has inforamtions about the user, we will update them, if we dont have, we will create
        $information = Informations::updateOrCreate(
        [
            'user_id' => auth()->id(),
        ],
        [
            'name' =>  $request->name,
            'lastname' => $request->lastname,
            'town' => $request->town,
            'psc' => $request->psc, 
            'street' => $request->street,
            'house_id' => $request->house_id,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('profile');
    }
}
