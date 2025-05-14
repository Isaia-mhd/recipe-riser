<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register()
    {
        request()->validate([
            'username' => 'required|string|max:20|min:3',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'string', Password::min(8)->letters()->mixedCase()->numbers()->symbols()]
        ]);

        $user = User::create([
            'username' => request()->username,
            'email' => request()->email,
            'password' => request()->password
        ]);

        return redirect()->route('login')->with('success', 'You are registered. Just Log In.');
    }
    public function login()
    {
        request()->validate([
           'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);

        $user = User::where('email', request()->get('email'))->first();
        if(!$user || !Hash::check(request()->password, $user->password))
        {
            return redirect()->back()->withErrors([
                'password' => 'password incorrect.'
            ]);
        }

        Auth::login($user);

        return redirect()->route('recipe.index')->with('success', 'You are Logged In.');

    }

    public function logout()
    {
        request()->session()->invalidate();
        Auth::logout();

        return redirect()->route('home')->with('success', 'You are Logged Out.');
    }
}
