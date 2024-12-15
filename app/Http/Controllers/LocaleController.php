<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    //
    public function setLocale($locale){
        if(in_array($locale, ['en', 'id', 'jp', 'kr', 'ru'])){
            session(['locale' => $locale]);
        }
        return redirect()->back();
    }
}
