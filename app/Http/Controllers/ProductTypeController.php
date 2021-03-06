<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductTypeRequest;
use App\Pet;
use Illuminate\Http\Request;
use App\ProductType;
use App\Product;

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
        return view('admin.product-types.index', ['productTypes' => $productTypes, 'categories' => $categories]);
    }

    public function add(ProductTypeRequest $request)
    {
        ProductType::create($request->all());
        return redirect('admin/product-types')->with(Controller::notification(ADD));
    }

    public function edit($id, ProductTypeRequest $request)
    {
        $productTypes = ProductType::find($id);
        $productTypes->update($request->all());
        return redirect('admin/product-types')->with(Controller::notification(EDIT));
    }

    public function view($id)
    {
        $productType = ProductType::find($id);
        return view('admin.product-types.view', compact('productType'));
    }

    public function delete($id)
    {
        $product = Product::query()->where('product_type_id', '=', $id)->first();
        if (empty($product)) {
            ProductType::destroy($id);
            return back()->with(Controller::notification(DELETE));
        }
        return back()->with(Controller::notification(DELETE_ERROR));
    }
}
