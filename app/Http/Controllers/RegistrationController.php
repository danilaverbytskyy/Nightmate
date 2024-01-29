<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function signUp(): View
    {
        return view('auth.sign-up');
    }

    public function signIn(): View
    {
        return view('auth.sign-in');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:63',
            'email' => 'required|email|unique:users',
            'password' => 'required|string'
        ]);

        $user = User::create($data);
        if ($user) {
            return to_route('auth.sign-in');
        }
        return back()->withInput()->withErrors(['email' => 'Неправильный email или пароль']);
    }

    public function enter(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $data['email'])->first();

        if ($user && Hash::check($data['password'], $user->password)) {
            Auth::login($user);
            return redirect()->route('home.dashboard');
        } else {
            return back()->withInput()->withErrors(['email' => 'Неправильный email или пароль']);
        }
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
