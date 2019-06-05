<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
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
