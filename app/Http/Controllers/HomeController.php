<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App;
use Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

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
            // session([static::$langKey => $lang]);
            // dd(Session::get(static::$langKey));
            /*\Session::set(static::$langKey, $lang);
            \Session::save();*/

            Session::put(static::$langKey, $lang);
            // dd(Session::get(static::$langKey));
            // dd(App::getLocale());
        }
// return "$lang";
        return redirect()->back();
        // return Redirect::back();
        // return view('home');
        // return back();
    }
}
