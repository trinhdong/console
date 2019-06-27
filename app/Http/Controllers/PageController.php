<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
class PageController extends Controller
{
    public function getIndex()
    {
    	$slide = Slide::all();
    	$new_products = Product::orderBy('product_name', 'desc')->paginate(4);
        //$rand_products =Product::inRandomOrder();
    	return view('page.index',['slide' => $slide], ['new_products' => $new_products]);
    }
    public function getProductstype($id)
    {
        $category_id = $id;
        $rand_products =Product::inRandomOrder()->take(100)->get();
        $product_type = ProductType::where('category_id' , $id)->get();
    	return view('page.products_type' , compact('rand_products', 'product_type' , 'category_id'));
    }
    public function getProductsByType($category_id, $id)
    {
        //truyền id của category vào để lấy được type_name của product_type
        $category_id = $category_id;
        $product_type = ProductType::where('category_id' , $category_id)->get();
        $products = Product::join('product_types', 'products.product_type_id', 'product_types.id')
            ->select('products.product_name','products.id')
            ->where('products.product_type_id', $id)
            ->get();
        $product_by_type = Product::where('product_type_id', $id)->get();    
        return view('page.products_by_type',compact('category_id', 'product_type' , 'products', 'product_by_type'));
    }
    public function getProductDetails()
    {
    	return view('page.products_details');
    }
    public function getContact()
    {
    	return view('page.contact');
    }
}