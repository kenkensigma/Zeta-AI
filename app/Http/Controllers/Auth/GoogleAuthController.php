<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function loginRedirect()
    {
        session(['google_mode' => 'login']);

        return Socialite::driver('google')
            ->redirectUrl(config('services.google.redirect'))
            ->redirect();
    }

    public function registerRedirect()
    {
        session(['google_mode' => 'register']);

        return Socialite::driver('google')
            ->redirectUrl(config('services.google.redirect'))
            ->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')
            ->stateless()
            ->user();

        $client = Client::where('email', $googleUser->getEmail())->first();

        // REGISTER MODE
        if (session('google_mode') === 'register') {
            if (! $client) {
                $client = Client::create(array_merge([
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'email_verified_at' => now(),
                    'profile_completed' => true
                ], Client::defaultProfile($googleUser->getEmail(), null)));
            }
        }

        // LOGIN MODE
        if (! $client) {
            return response()->view('auth.google-close', [
                'error' => 'not_registered'
            ]);
        }

        if (! $client->google_id) {
            $client->update([
                'google_id' => $googleUser->getId(),
                'email_verified_at' => now(),
            ]);
        }

        Auth::login($client);

        return response()->view('auth.google-close');
    }
}
