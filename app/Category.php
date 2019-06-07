<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public static function searchQuery(string $id = '', string $category = '') {
        $query = Category::query();
        if ($id) {
            $query->where(['id' => $id]);
        }
        if ($category != '') {
            $query->where('category_name', 'LIKE', '%' . $category . '%');
        }
        return $query->get();
    }
}
