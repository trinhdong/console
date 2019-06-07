<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

    public function index(Request $request) {
        $categories = Category::searchQuery(
            $request->input('id') ?? '',
            $request->input('category') ?? ''
        );
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function add() {

    }

    public function edit() {

    }

    public function view() {

    }

    public function delete () {

    }
}
