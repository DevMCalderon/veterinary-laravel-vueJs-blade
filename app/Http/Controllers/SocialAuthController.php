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
    public function redirectTo($provider)
    {
        switch ($provider) {
            case 'google':
                return Socialite::driver('google')->redirect();
                break;
            case 'facebook':
                return Socialite::driver('facebook')->redirect();
                break;
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback($provider)
    {
        switch ($provider) {
            case 'google':
                try {
                    $user = Socialite::driver('google')->user();
                    $finduser = User::where('google_id', $user->id)->first();
                    if($finduser){
             
                        Auth::login($finduser);
            
                        return redirect('/');
             
                    }else{
                        $newUser = User::create([
                            'name' => $user->name,
                            'email' => $user->email,
                            'google_id'=> $user->id,
                            'role_id'=> 3,
                            'password' => bcrypt('123456')
                        ]);
            
                        Auth::login($newUser);
             
                        return redirect('/');
                    }
                } catch (Exception $e) {
                    dd($e->getMessage());
                }
                break;
            case 'facebook':
                $user = Socialite::driver('facebook')->user();
                $isUser = User::where('fb_id', $user->id)->first();
        
                if($isUser){
                    Auth::login($isUser);
                    return redirect('/');
                }else{
                    $createUser = User::create([
                        'role_id' => 3,
                        'name' => $user->name,
                        'email' => $user->email,
                        'fb_id' => $user->id,
                        'password' => bcrypt('admin@123')
                    ]);
        
                    Auth::login($createUser);
                    return redirect('/');
                }
                break;
        }
        
    }
}
