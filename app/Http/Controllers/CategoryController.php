<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::searchQuery(
            $request->input('id') ?? '',
            $request->input('category') ?? ''
        );
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function add(CategoryRequest $request)
    {
        Category::create($request->all());
        return redirect('admin/categories')->with('success', 'Thêm danh mục thành công');
    }

    public function edit($id, CategoryRequest $request)
    {
        $category = Pet::find($id);
        $category->update($request->all());
        return redirect('admin/categories')->with('success', 'Cập nhật danh mục thành công');
    }

    public function view($id)
    {
        $category = Category::find($id);
        return view('admin.categories.view', compact('category'));
    }

    public function delete($id)
    {
        Category::destroy($id);
        return back()->with('success', 'Xóa danh mục thành công');
    }
}
