<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Product extends Model
{
    protected $table = "products";
    protected $fillable = array('product_name', 'image', 'price', 'product_type_id','created_at');
   	public function productTypes ()
   	{
    	return $this->belongsTo('App\ProductType','product_type_id','id');	
    }
    public function getCreatedAtAttribute($date)
	{
   		 return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
	}
	
}
