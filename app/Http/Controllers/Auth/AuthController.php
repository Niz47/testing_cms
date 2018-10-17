<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Socialite;
use Exception;
use Auth;
use Log;

class AuthController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard $auth
     * @param  \Illuminate\Contracts\Auth\Registrar $registrar
     * @return void
     */
     public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            $error = $e->getMessage();
            return redirect('/login')->withError($error);
        }

        // OAuth One Providers
        $token = $user->token;
        $email = $user->getEmail();
        Log::debug('Login - Email >> '.$user->getEmail());

        if($token && $email){
            $allowed = config("services.google.allowed");
            $domain = substr(strrchr($email, "@"), 1);

            if (!in_array($domain,$allowed)) {
                return redirect('/login')->with("ErrMsg", "Your email: $email is not allowed!");
            }

            $existUser = User::where('email',$email)->first();

            if($existUser) {
            	Auth::login($existUser);
                // Auth::loginUsingId($existUser->id);
            }
            else {
                $newUser = new User;
                $newUser->name = $user->getName();
                $newUser->email = $user->getEmail();
	            $newUser->picture = $user->getAvatar();
	            $newUser->uid = $user->getId();
	            $newUser->locale = "en";
	            // $newUser->locale = @$user->user['locale'];
                $newUser->save();
            	Auth::login($newUser);
                // Auth::loginUsingId($newUser->id);
            }

            //set default role to user
            // if(!$u->roles()->exists()) $u->attachRole(\App\Role::whereName('user')->first());
        }

        return redirect()->route('home');
    }
}
