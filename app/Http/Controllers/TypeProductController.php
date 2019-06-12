<?php

namespace App\Http\Controllers;
use App\Http\Requests\TypeProductRequest;
use App\Category;
use Illuminate\Http\Request;
use App\TypeProduct;

class TypeProductController extends Controller
{
    public function index(Request $request)
    {
    	$product_types = TypeProduct::all();
    	return view('admin.typeproduct.index',['product_types'=>$product_types]);
    }
    public function add(TypeProductRequest $request) {
        TypeProduct::create($request->all());
        return redirect('admin/typeproduct')->with(Controller::notification(ADD));
    }
    public function edit($id ,TypeProductRequest $request)
    {
    	$product_types = TypeProduct::find($id);
    	$product_types->update($request->all());
    	return redirect('admin/typeproduct')->with(Controller::notification(EDIT));
    }
    public function view($id)
    {
        $product_types = TypeProduct::find($id);
        return view('admin.typeproduct.view', compact('product_types'));
    }
    public function delete($id)
    {
        TypeProduct::destroy($id);
        return back()->with(Controller::notification(DELETE));
    }
}
