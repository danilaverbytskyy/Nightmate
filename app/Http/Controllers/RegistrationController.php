<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function signUp() : View {
        return view('auth.sign-up');
    }

    public function logIn() : View {
        return view('auth.log-in');
    }

    public function store(Request $request) {

    }

    public function enter(Request $request) {

    }
}
