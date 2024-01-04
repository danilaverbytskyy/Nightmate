<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        $data = $request->except('_token');

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        User::add($data);

        return to_route('admin.users.index');
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(Request $request, string $id): RedirectResponse {
        $request->validate([
            'name' => 'required|string|max:63',
            'email' => [
                Rule::unique('users')->ignore($id),
                'email',
                'string'
            ],
            'password' => 'max:63'
        ]);

        $user = User::findOrFail($id);
        $user->edit($request);

        return to_route('admin.users.index');
    }

    public function destroy(string $id) : RedirectResponse
    {
        User::findOrFail($id)->delete();
        return to_route('admin.users.index');
    }
}
