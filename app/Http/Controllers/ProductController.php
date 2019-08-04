<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Requests\ProductRequest;
use App\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::searchQuery(
            $request->input('product_id') ?? '',
            $request->input('product_name') ?? '',
            $request->input('type_id') ?? ''
        );
        $productTypes = ProductType::pluck('type_name', 'id')->toArray();
        return view('admin.products.index', ['products' => $products, 'productTypes' => $productTypes]);
    }

    public function add(Request $request)
    {
        $step = intval($request->input('step')) ?? 1;
        if ($step <= 2) {
            $this->validate($request, ['pet_id' => 'required',], ['pet_id.required' => 'Vui lòng chọn thú cưng',]);
            $petId = $request->input('pet_id');
            return redirect("admin/products/add?step=" . $step . "&pet_id=" . $petId);
        }

        $this->validate($request, [
            'product_name' => 'required|unique:products|min:3|max:100',
            'category_id' => 'required',
            'product_type_id' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ], [
            'category_id.required' => 'Vui lòng chọn danh mục',
            'product_type_id.required' => 'Vui lòng chọn loại sản phẩm',
            'product_name.required' => 'Vui lòng nhập tên sản phẩm!',
            'product_name.unique' => 'Tên sản phẩm đã tôn tại!',
            'product_name.min' => 'Tên không được nhỏ hơn 3 ký tự',
            'product_name.max' => 'Tên không được lớn hơn 50 ký tự',
            'quantity.required' => 'Vui lòng nhập số lượng',
            'price.required' => 'Vui lòng nhập giá cho sản phẩm'
        ]);

        $products = new Product;
        $products->product_name = $request->input('product_name');
        $products->product_type_id = $request->input('product_type_id');
        $products->quantity = $request->input('quantity');
        $products->price = $request->input('price');
        $products->promotion_price = $request->input('promotion_price');
        $products->description = $request->input('description');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_type = $file->getClientOriginalExtension();
            if ($file_type != 'jpg' && $file_type != 'png' && $file_type != 'jpeg') {
                return redirect('admin/products/add')->with(Controller::notification(WARNING));
            }
            $name = $file->getClientOriginalName();
            $image = "" . $name;
            $file->move("source/images/products/", $image);
            $products->image = $image;
        }
        $products->save();

        return redirect('admin/products')->with(Controller::notification(ADD));
    }

    public function edit(ProductRequest $request, $id)
    {
        $products = Product::find($id);
        $products->product_name = $request->input('product_name');
        $products->product_type_id = $request->input('product_type_id');
        $products->quantity = $request->input('quantity');
        $products->price = $request->input('price');
        $products->promotion_price = $request->input('promotion_price');
        $products->description = $request->input('description');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_type = $file->getClientOriginalExtension();
            if ($file_type != 'jpg' && $file_type != 'png' && $file_type != 'jpeg') {
                return redirect('admin/products/add')->with(Controller::notification(WARNING));
            }
            $name = $file->getClientOriginalName();
            $image = "" . $name;
            $file->move("source/images/products/", $image);
            $products->image = $image;
        }
        $products->save();
        return redirect('admin/products')->with(Controller::notification(EDIT));
    }

    public function view($id)
    {
        $product = Product::find($id);
        return view('admin.products.view', ['product' => $product]);
    }

    public function delete($id)
    {
        Product::destroy($id);
        return back()->with(Controller::notification(DELETE));
    }

}