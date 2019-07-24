<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'content', 'user_id', 'product_id'];

    public static function searchQuery($id = '', $title = '', $productId = '')
    {
        $query = Comment::query();
        if ($id !== '') {
            $query->where(['id' => $id]);
        }
        if ($title !== '') {
            $query->where('title', 'LIKE', '%' . $title . '%');
        }
        if ($productId !== '') {
            $query->where(['product_id' => $productId]);
        }
        $query->orderBy('id', 'DESC');
        return $query->get();
    }

    public function products()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
