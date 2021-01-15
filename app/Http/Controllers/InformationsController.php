<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInformationRequest;
use App\Models\Informations;
use Illuminate\Http\Request;

class InformationsController extends Controller
{



    public function store(StoreInformationRequest $request) {

        $information = new Informations;
        $information->user_id = $request->user()->id;
        $information->name = $request->name;
        $information->lastname = $request->lastname;
        $information->town = $request->town;
        $information->psc = $request->psc;
        $information->street = $request->street;
        $information->house_id = $request->house_id;
        $information->phone_number = $request->phone_number;

        $information->save();

        return back();
    }
}
