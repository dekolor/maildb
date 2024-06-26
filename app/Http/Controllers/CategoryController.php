<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function list() {
        return view('category.list', [
            'categoryList' => Category::paginate(10)
        ]);
    }

    public function add() {
        return view('category.add');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'color' => 'required|hex_color'
        ]);

        $category = new Category();
        $category->name = $validated['name'];
        $category->color = $validated['color'];

        $category->save();

        return redirect(route('category.list'));
    }
}
