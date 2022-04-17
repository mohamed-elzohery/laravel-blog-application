<?php

namespace App\Http\Controllers;
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
 
    public function callback($provider)
    {

               
        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo,$provider);
 
        auth()->login($user);
 
        return redirect()->to('/home');
 
    }
   function createUser($getInfo,$provider){
 
    // $user = User::where('provider_id', $getInfo->id)->first();
    // $userEmail = User::where('email', $getInfo->email)->first();

    $user = User::where('provider_id', $getInfo->id)->first() ? User::where('provider_id', $getInfo->id)->first() : User::where('email', $getInfo->email)->first();

     if (!$user) {
         $user = User::create([
            'name'     => $getInfo->name,
            'email'    => $getInfo->email,
            'password'    => "123123123",
            'provider' => $provider,
            'provider_id' => $getInfo->id
        ]);
      }
      return $user;
   }
}
