<?php

namespace App\Http\Controllers;
use App\ProductType;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(Request $request)
    {
    	$products = Product::all();

    	$productTypes = ProductType::pluck('type_name', 'id')->toArray();
    	return view('admin.products.index',['products'=>$products , 'productTypes'=>$productTypes]);
    }  
    public function add(ProductRequest $request) 
    {
        $products = new Product;
        $products->product_name = $request->product_name;
        $products->product_type_id = $request->product_type_id;
        $products->quantity = $request->quantity;
        $products->price = $request->price;
        $products->promotion_price = $request->promotion_price;
        $products->description = $request->description;
        $products->product_type_id = $request->product_type_id;
         if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $file_type = $file->getClientOriginalExtension();
            if($file_type != 'jpg' && $file_type != 'png' && $file_type != 'jpeg')
            {
                return redirect('admin/products/add')->with(Controller::notification(WARNING));
            }
            $name = $file->getClientOriginalName();
             $image="".$name;
            $file->move("source/images/products/",$image);
            $products->image=$image;
        }
        $products->save();
         
        return redirect('admin/products')->with(Controller::notification(ADD));    
    }
    public function edit(ProductRequest $request, $id)
    {   
        $products = Product
        ::find($id);
        $products->product_name = $request->product_name;
        $products->product_type_id = $request->product_type_id;
        $products->quantity = $request->quantity;
        $products->price = $request->price;
        $products->promotion_price = $request->promotion_price;
        $products->description = $request->description;
        $products->product_type_id = $request->product_type_id;
         if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $file_type = $file->getClientOriginalExtension();
            if($file_type != 'jpg' && $file_type != 'png' && $file_type != 'jpeg')
            {
                return redirect('admin/products/add')->with(Controller::notification(WARNING));
            }
            $name = $file->getClientOriginalName();
             $image="".$name;
            $file->move("source/images/products/",$image);
            $products->image=$image;
        }
        $products->save();
        return redirect('admin/products')->with(Controller::notification(EDIT));
    }
    public function view($id)
    {
        $products = Product::find($id);
        return view('admin.products.view', ['products'=>$products]);
    }
    public function delete($id)
    {
        Product::destroy($id);
        return back()->with(Controller::notification(DELETE));
    }

}