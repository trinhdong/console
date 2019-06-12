<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
//    protected $guarded = ['pet_name'];
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

    public function pets()
    {
        return $this->belongsTo('App\Pet', 'pet_id', 'id');
    }

    public function productTypes()
    {
        return $this->hasMany('App\ProductType', 'category_id', 'id');
    }
}
