<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class LanguageController extends Controller
{
    //

    public function languageChanger($locale){
        
        session(['app_locale' => $locale]);
        App::setLocale($locale);
        return back();
    }
}