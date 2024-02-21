<?php

namespace App\Http\Controllers;

use App\Models\Dream;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DreamController extends Controller
{

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'string|max:63',
            'content' => 'string',
            'date' => 'date',
        ]);
        $data['user_id'] = Auth::id();
        $dream = new Dream();
        $dream->fill($data);
        $dream->save();
        return to_route('home.dashboard');
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        if(!$id) {
            return to_route('home.dashboard');
        }
        $data = $request->validate([
            'title' => 'string|max:63',
            'content' => 'string',
            'date' => 'date',
        ]);
        $data['user_id'] = Auth::id();
        DB::table('dreams')->where('id', $id)->update($data);
        return to_route('home.dashboard');
    }

    public function destroy(Request $request, string $id) : RedirectResponse
    {
        if (! $id) {
            return to_route('home.dashboard');
        }
        Dream::destroy($id);
        return to_route('home.dashboard');
    }
}
