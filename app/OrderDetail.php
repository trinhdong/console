<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package App
 * @property int $id;
 * @property int $product_id;
 * @property int $order_id;
 * @property int $quantity;
 * @property float $price;
 */
class OrderDetail extends Model
{
    protected $table = 'order_details';
}
