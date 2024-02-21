<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function update(Request $request) : RedirectResponse
    {
        $data = $request->validate([
            'name' => 'string|max:63',
            'email' => 'string|email',
            'password' => ''
        ]);

        $user = User::find(Auth::id());

        if($user) {
            $user->edit($data);
        }
        return to_route('home.edit-user');
    }
}
