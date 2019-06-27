<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = array('product_name', 'image', 'price','promotion_price', 'product_type_id','created_at');
   	public function productTypes ()
   	{
    	return $this->belongsTo('App\ProductType','product_type_id','id');	
    }
}
