<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dream;
use Illuminate\Support\Facades\Hash;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
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

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            // Add more validation rules as needed
        ]);

        // Exclude _token from the request data
        $data = $request->except('_token');

        $dream = new Dream($data);
        $dream->save();

        return redirect()->route('admin.dreams.index');
    }
}
