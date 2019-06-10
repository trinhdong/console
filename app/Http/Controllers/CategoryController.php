<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Pet;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::searchQuery(
            $request->input('id') ?? '',
            $request->input('category') ?? '',
            $request->input('pet_id') ?? ''
        );
        $pets = Pet::pluck('pet_name', 'id')->toArray();
        return view('admin.categories.index', ['categories' => $categories, 'pets' => $pets]);
    }

    public function add(CategoryRequest $request)
    {
        Category::createOrFail($request->all());
        return redirect('admin/categories')->with(Controller::notification(ADD));
    }

    public function edit($id, CategoryRequest $request)
    {
        $category = Pet::find($id);
        $category->update($request->all());
        return redirect('admin/categories')->with(Controller::notification(EDIT));
    }

    public function view($id)
    {
        $category = Category::find($id);
        return view('admin.categories.view', compact('category'));
    }

    public function delete($id)
    {
        Category::destroy($id);
        return back()->with(Controller::notification(DELETE));
    }
}
