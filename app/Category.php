<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['category_name', 'pet_id'];

    public static function searchQuery($id = '', $categoryName = '', $petId = '')
    {
        $query = Category::query();
        if ($id !== '') {
            $query->where(['id' => $id]);
        }
        if ($categoryName !== '') {
            $query->where('category_name', 'LIKE', '%' . $categoryName . '%');
        }
        if ($petId !== '') {
            $query->where(['pet_id' => $petId]);
        }
        $query->orderBy('id', 'DESC');
        return $query->get();
    }

    public static function getCategoryByPetId($petId)
    {
        return Category::query()
            ->where(['pet_id' => $petId])
            ->pluck('category_name','id')
            ->toArray();
    }

    public function pets()
    {
        return $this->belongsTo('App\Pet', 'pet_id', 'id');
    }

    public function productTypes()
    {
        return $this->hasMany('App\ProductType', 'category_id', 'id');
    }

    public function products(){
        return $this->hasManyThrough('App\Product','App\ProductType','category_id','product_type_id','id');
    }
}
