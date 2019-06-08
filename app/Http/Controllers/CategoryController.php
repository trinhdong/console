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

    public function add(Request $request) {
        $category = new Category([
            'category_name' => $request->input('category')
        ]);
        $category->save();
        return redirect('admin/categories')->with( 'success', 'Thêm danh mục thành công' );
    }

    public function edit() {

    }

    public function view() {

    }

    public function delete () {

    }
}
