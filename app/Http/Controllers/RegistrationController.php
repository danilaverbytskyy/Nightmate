<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function signUp() : View {
        return view('auth.sign-up');
    }

    public function signIn() : View {
        return view('auth.sign-in');
    }

    public function store(Request $request): RedirectResponse {
        $data = $request->validate([
            'name' => 'required|string|max:63',
            'email' => 'required|email|unique:users',
            'password' => 'required|string'
        ]);

        User::create($data);

        return to_route('auth.sign-up');
    }

    public function enter(Request $request) {

    }
}
