<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class AuthController extends Controller
{
    public function profile($user)
    {
        $user = User::find($user);
        $recipes = Recipe::with('comments')->where('user_id', $user->id)->get();
        return view('pages.auth.profile', compact('recipes', 'user'));
    }


    public function register()
    {
        request()->validate([
            'name' => 'required|string|max:50|min:2',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'string', Password::min(8)->letters()->mixedCase()->numbers()->symbols()]
        ]);

        $user = User::create([
            'name' => request()->name,
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

    public function edit($user)
    {
        $user = User::find($user);
        return view('pages.auth.edit', compact('user'));
    }
    public function update()
    {
        $user = auth()->user();
        $validated = request()->validate([
            "bio" => "max:255",
            "name" => "required|string|min:2|max:50",
            "avatar" => "image|max:2048|mimes:png,jpg,jpeg,webp,avif,svg,gif"
        ]);

        if(request()->hasFile('avatar'))
        {
            $path = request()->file('avatar')->store('profile', 'public');
            $validated['avatar'] = $path;

            $user->update([
                "avatar" => $validated['avatar']
            ]);
        }

        $user->update([
            "bio" => request()->bio,
            "name" => request()->name,
        ]);


        return redirect()->route("profile", $user->id)->with('success', 'Profile Updated');
    }
}
