<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Pet Entity
 *
 * @property int $id
 * @property string $pet_name
 */

class Pet extends Model
{
    protected $id =3;
    protected $table = 'pets';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable = array('pet_name');

    public static function searchQuery(string $id = '', string $pet = '') {
        $query = Pet::query();
        if ($id) {
            $query->where(['id' => $id]);
        }
        if ($pet != '') {
            $query->where('pet_name', 'LIKE', '%' . $pet . '%');
        }
        return $query->get();
    }
}
