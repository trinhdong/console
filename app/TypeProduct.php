<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
   protected $table = 'product_types';
   protected $fillable = array('type_name','category_id');


   public function category ()
   {
   	return $this->belongsTo('App\Category','category_id','id');
   }
}

