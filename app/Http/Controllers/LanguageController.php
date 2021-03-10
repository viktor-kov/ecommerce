<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class LanguageController extends Controller
{
    public function setLanguage($lang) {
        if(array_key_exists($lang, Config::get('language'))) {
            session()->put('applocale', $lang);
        }

        return back()->with('success', 'Jazyk sa nastavil');
    }
}
