<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
//    protected $guarded = ['pet_name'];
    protected $fillable = ['category_name', 'pet_id'];

    public static function searchQuery(string $id = '', string $category = '', string $pet_id = '') {
        $query = Category::query();
        if ($id) {
            $query->where(['id' => $id]);
        }
        if ($category != '') {
            $query->where('category_name', 'LIKE', '%' . $category . '%');
        }
        if ($pet_id != '') {
            $query->where(['pet_id' => $pet_id]);
        }
        $query->orderBy('id','DESC');
        return $query->get();
    }

    public function pets()
    {
        return $this->belongsTo('App\Pet', 'pet_id', 'id');
    }
}
