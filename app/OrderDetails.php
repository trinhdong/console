<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'order_details';

    public function Products(){
    	return $this->belongsTo('App\Product','product_id','id');
    }
}
