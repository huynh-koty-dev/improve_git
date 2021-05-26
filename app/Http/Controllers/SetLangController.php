<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Session;

class SetLangController extends Controller
{    
    public function setLang($language)
    {
        \Session::put('website_language', $language);

        return redirect()->back();
    }
}
