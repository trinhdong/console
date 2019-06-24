<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
class PageController extends Controller
{
    public function getIndex()
    {
    	$slide = Slide::all();
    	$new_products = Product::where('new',0)->paginate(8);
    	return view('page.index',['slide' => $slide], ['new_products' => $new_products]);
    }
    public function getProducts()
    {
    	return view('page.products_type');
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
