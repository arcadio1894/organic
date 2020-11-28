<?php

namespace App\Http\Controllers\Auth;

use App\Customer;
use App\Department;
use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $social_user = Socialite::driver($provider)->user();
        if ( $user = User::where('email', $social_user->email)->first() )
        {
            return $this->authAndRedirect($user);
        } else {
            $user = User::create([
                'name' => $social_user->name,
                'email' => $social_user->email,
            ]);
            $user->assignRole('user');
            $customer = Customer::create([
                'name' => $social_user->name,
                'phone' => '985487451',
                'user_id' => $user->id,
            ]);

            // TODO: Generamos el evento UserRegistered para el envio de correos
            $departments = Department::all();
            event(new UserRegistered($user, $departments));
            return $this->authAndRedirect($user);
        }
    }

    public function authAndRedirect($user)
    {
        Auth::login($user);
        return redirect()->to('/home');
    }
}
