<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'product_types';
    protected $fillable = array('type_name', 'category_id');

    public static function searchQuery($id = '', $typeName = '', $categoryId = '')
    {
        $query = ProductType::query();
        if ($id !== '') {
            $query->where(['id' => $id]);
        }
        if ($typeName !== '') {
            $query->where('type_name', 'LIKE', '%' . $typeName . '%');
        }
        if ($categoryId !== '') {
            $query->where(['category_id' => $categoryId]);
        }
        $query->orderBy('id', 'DESC');
        return $query->get();
    }

    public function categories()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}