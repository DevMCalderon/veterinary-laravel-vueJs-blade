<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Http\Request;

use function Psy\debug;

class SocialAuthController extends Controller
{
    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook()
    {
       
        $facebookUser = Socialite::driver('facebook')->user();
        dd($facebookUser);
        // try {
        //     $findUser = User::where('FB_id', $facebookUser->id)->first();

           
        //     if ($findUser) {
        //         Auth::login($findUser);
        //         return redirect()->intended('home');
        //     }else{
        //         $newUser = User::create([
        //             'name' => $facebookUser->name,
        //             'email' => $facebookUser->email,
        //             'FB_id' => $facebookUser->FB_id,
        //             'password' => bcrypt('12345678')
        //         ]);

        //             Auth::login($newUser);
        //             return redirect()->intended('home');
        //     }
        // } catch (\Exception $e) {
        //     dd($e->getMessage());
        // }
    }
}
