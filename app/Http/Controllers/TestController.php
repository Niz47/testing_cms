<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App;

class TestController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setLanguage($lang)
    {
        $languages = ['en', 'my'];
        if (in_array($lang, $languages)) {
            App::setLocale($lang);
            Session::put('langKey', $lang);

            /*\App::setLocale($lang);
            \Session::set(static::$langKey, $lang);
            \Session::save();*/
        }

        return redirect()->back();
    }
}
