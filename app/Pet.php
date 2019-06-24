<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'pets';
    protected $primaryKey = 'id';
//    protected $guarded = [];
    protected $fillable = array('pet_name');

    public static function searchQuery($id = '', $petName = '')
    {
        $query = Pet::query();
        if ($id !== '') {
            $query->where(['id' => $id]);
        }
        if ($petName !== '') {
            $query->where('pet_name', 'LIKE', '%' . $petName . '%');
        }
        $query->orderBy('id', 'DESC');
        return $query->get();
    }

    public function categories()
    {
        return $this->hasMany('App\Category', 'pet_id', 'id');
    }

    public function productTypes()
    {
        return $this->hasManyThrough('App\ProductType', 'App\Category','pet_id', 'category_id', 'id');
    }
}
