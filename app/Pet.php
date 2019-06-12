<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'pets';
    protected $primaryKey = 'id';
//    protected $guarded = [];
    protected $fillable = array('pet_name');

    public static function searchQuery(string $id = '', string $pet = '')
    {
        $query = Pet::query();
        if ($id) {
            $query->where(['id' => $id]);
        }
        if ($pet != '') {
            $query->where('pet_name', 'LIKE', '%' . $pet . '%');
        }
        $query->orderBy('id','DESC');
        return $query->get();
    }

    public function categories()
    {
        return $this->hasMany('App\Category', 'pet_id', 'id');
    }
}
