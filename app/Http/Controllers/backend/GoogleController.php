<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    function goGoogle(){
        
            return Socialite::driver('google')->redirect();
     
    }

    function backFromGoogle(Request $request){
 
            $user = Socialite::driver('google')->user();
         
           if($user){
                $authUser = User::updateOrCreate([
                        'email' => $user->email,
                    ], [
                        'name' => $user->name,
                        'email' => $user->email,
                        'password' => Hash::make(uniqid()),
                        'designation' => "Developer",
                        
                    ]);
                    
                    Auth::login($authUser);
                    return redirect()->route('home');
           }

           
         
         
    }

    function goFacebook(){
        
        return Socialite::driver('facebook')->redirect();
    }

     function backFromFacebook(Request $request){

                $user = Socialite::driver('facebook')->user();
            
            if($user){
                    $authUser = User::updateOrCreate([
                            'email' => $user->email,
                        ], [
                            'name' => $user->name,
                            'email' => $user->email,
                            'password' => Hash::make(uniqid()),
                            'designation' => "Developer",
                            
                        ]);
                        
                        Auth::login($authUser);
                        return redirect()->route('home');
            }

            
            
            
        }
   
}
