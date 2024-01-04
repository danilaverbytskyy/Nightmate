<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index() : View {
        $categories = Category::all();
        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function create() : View {
        return view('admin.categories.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'title' => 'required|string|max:63',
        ]);

        $data = $request->except('_token');

        Category::add($data);

        return redirect()->route('admin.categories.index');
    }

    public function show($id): View {
        $category = Category::find($id);
        return view('admin.categories.show', ['category' => $category]);
    }

    public function edit($id): View {
        $category = Category::find($id);
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, $id): RedirectResponse {
        $request->validate([
            'title' => 'required|string|max:63',
        ]);

        $category = Category::find($id);
        $category->edit($request);
        return redirect()->route('admin.categories.index');
    }

    public function destroy($id): RedirectResponse {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}

