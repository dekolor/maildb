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
}
