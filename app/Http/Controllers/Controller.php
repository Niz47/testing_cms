<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Session;
use App;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected static $langKey = 'langKey';

    public function __construct()
    {
        $this->setLocale();
    }

    protected function setLocale()
    {
        // Check Session first
        $lang = Session::get(static::$langKey);
        if ($lang) {
            App::setLocale($lang);
            // check url
        } elseif (Input::get('my') !== NULL || Input::get('en') !== NULL) {
            $locale = (Input::get('my') !== NULL) ? 'my' : 'en';
            App::setLocale($locale);
        }/* elseif (! Agent::isMobile()) {
            // desktop default to myanmar
            $locale = 'my';
            App::setLocale($locale);
        } elseif (detect_language()) {
            App::setLocale(detect_language());
        } */
    }
}
