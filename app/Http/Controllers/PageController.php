<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * setLanguage
     *
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
