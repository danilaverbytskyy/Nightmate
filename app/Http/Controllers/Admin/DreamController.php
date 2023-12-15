<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dream;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DreamController extends Controller
{
    public function index() : View {
        $dreams = Dream::all();
        return view('admin.dreams.index', [
            'dreams' => $dreams,
        ]);
    }

    public function create() : View {
        return view('admin.dreams.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'title' => 'required|string|max:63',
            'content' => 'required|string',
        ]);

        $data = $request->except('_token');

        $dream = new Dream($data);
        $dream->save();

        return redirect()->route('admin.dreams.index');
    }

    public function show($id): View {
        $dream = Dream::find($id);
        return view('admin.dreams.show', ['dream' => $dream]);
    }

    public function edit($id): View {
        $dream = Dream::find($id);
        return view('admin.dreams.edit', ['dream' => $dream]);
    }

    public function update(Request $request, $id): RedirectResponse {
        $request->validate([
            'title' => 'required|string|max:63',
            'content' => 'required|string',
        ]);

        $dream = Dream::find($id);
        $dream->update($request->all());
        return redirect()->route('admin.dreams.index');
    }

    public function destroy($id): RedirectResponse {
        $dream = Dream::find($id);
        $dream->delete();
        return redirect()->route('admin.dreams.index');
    }
}
