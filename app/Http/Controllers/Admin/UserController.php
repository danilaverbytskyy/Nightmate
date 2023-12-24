<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data = $request->except('_token');
        if(isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $user = new User($data);
        $user->save();

        return redirect()->route('admin.users.index');
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(Request $request, string $id): RedirectResponse {
        $request->validate([
            'name' => 'required|string|max:63',
            'email' => 'required|email|string'
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return to_route('admin.users.index');
    }

    public function destroy(string $id) : RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();
        return to_route('admin.users.index');
    }
}
