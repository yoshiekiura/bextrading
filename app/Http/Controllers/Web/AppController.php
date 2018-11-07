<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppController extends Controller

{
    public function setLanguage($lang)
    {
        if (array_key_exists($lang, config('languages'))) {
            session()->put('applocale', $lang);
        }

        return back();
    }
}
