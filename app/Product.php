<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $product_type_id
 * @property integer $quantity
 * @property float $price
 * @property integer $promotion_price
 * @property string $product_name
 * @property string $description
 * @property integer $pet_id
 * @property integer $category_id
 * @property string $image
 */
class Product extends Model
{
    protected $table = "products";
    public $timestamps = false;
    protected $fillable = array('product_name', 'image', 'price', 'promotion_price', 'product_type_id', 'created_at', 'updated_at');

   	public function productTypes ()
   	{
    	return $this->belongsTo('App\ProductType','product_type_id','id');	
    }

    public static function searchQuery($id = '', $productName = '', $typeId = '')
    {
        $query = Product::query();
        if ($id !== '') {
            $query->where(['id' => $id]);
        }
        if ($productName !== '') {
            $query->where('product_name', 'LIKE', '%' . $productName . '%');
        }
        if ($typeId !== '') {
            $query->where(['product_type_id' => $typeId]);
        }
        $query->orderBy('id', 'DESC')->distinct();
        return $query->get();
    }
}
