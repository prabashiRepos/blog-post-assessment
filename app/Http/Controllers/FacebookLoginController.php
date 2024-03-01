<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class FacebookLoginController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function redirectToFacebook(): RedirectResponse
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * @return RedirectResponse
     */
    public function handleFacebookCallback(): RedirectResponse
    {
        $user = Socialite::driver('facebook')->user();

        $existingUser = User::where('facebook_id', $user->id)->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {
            $newUser = new User();
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->facebook_id = $user->id;
            $newUser->password = bcrypt(request(Str::random())); // Set some random password
            $newUser->save();

            auth()->login($newUser, true);
        }

        return redirect()->intended('/dashboard');
    }
}
