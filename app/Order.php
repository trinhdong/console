<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table = 'orders';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public static function getOrderInfoByUserId($id)
    {
        return DB::table('orders')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->leftjoin('products', 'order_details.product_id', '=', 'products.id')
            ->where('orders.user_id', '=', $id)
            ->select('orders.*', 'order_details.*', 'products.product_name as product_name')
            ->get();
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
