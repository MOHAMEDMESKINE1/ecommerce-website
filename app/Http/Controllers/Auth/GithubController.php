<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }
          
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGithubCallback()
    {
        try {
        
            $user = Socialite::driver('github')->user();
         
            $finduser = User::where('github_id', $user->id)->first();
         
            if($finduser){
         
                Auth::login($finduser);
        
                return redirect()->route('home');
         
             }
            else{
                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'name' => $user->name,
                        'github_id'=> $user->id,
                        'password' => encrypt('password')
                    ]);
        
                Auth::login($newUser);
        
                return redirect()->route('home');
            }
        
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
