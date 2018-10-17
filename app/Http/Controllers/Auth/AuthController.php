<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Socialite;
use Exception;
use Auth;
use Log;

class AuthController extends Controller
{
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
        	Log::debug('Google Exception .... '.$e);
            // return redirect('auth/google');
            return redirect('/login');
        }

        // OAuth One Providers
        $token = $user->token;
        $email = $user->getEmail();
        Log::debug('Login - Email >> '.$user->getEmail());

        if($token && $email){
            $allowed = config("services.google.allowed");
            $domain = substr(strrchr($email, "@"), 1);

            if (!in_array($domain,$allowed)) {
                // return redirect('/login')->withError("Your email: $email is not allowed!");
                return redirect('/login');
            }

            $existUser = User::where('email',$email)->first();

            if($existUser) {
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
                // Auth::loginUsingId($newUser->id);
            }

            // Auth::login($u);
           
            //set default role to user
            // if(!$u->roles()->exists()) $u->attachRole(\App\Role::whereName('user')->first());
        }

        return redirect('/');
    }
}
