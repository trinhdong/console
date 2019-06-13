<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductTypeRequest;
use App\Pet;
use Illuminate\Http\Request;
use App\ProductType;

class ProductTypeController extends Controller
{
    public function index(Request $request)
    {
        $productTypes = ProductType::searchQuery(
            $request->input('id') ?? '',
            $request->input('type_name') ?? '',
            $request->input('category_id') ?? ''
        );;
        $categories = Category::pluck('category_name', 'id')->toArray();
        return view('admin.product_types.index', ['productTypes' => $productTypes, 'categories' => $categories]);
    }

    public function add(ProductTypeRequest $request)
    {
        ProductType::create($request->all());
        return redirect('admin/product_types')->with(Controller::notification(ADD));
    }

    public function edit($id, ProductTypeRequest $request)
    {
        $productTypes = ProductType::find($id);
        $productTypes->update($request->all());
        return redirect('admin/product_types')->with(Controller::notification(EDIT));
    }

    public function view($id)
    {
        $productType = ProductType::find($id);
        return view('admin.product_types.view', compact('productType'));
    }

    public function delete($id)
    {
        ProductType::destroy($id);
        return back()->with(Controller::notification(DELETE));
    }
}
