<?php

namespace App;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property string email;
 * @property string name;
 * @property string password;
 */
class AdminUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin_users';
    protected $primaryKey = 'id';
    protected $fillable = array('name', 'email', 'password', 'crated_at', 'updated_at');
    protected $hidden = array('password', 'remember_token');

    public static function searchQuery($id = '', $name = '', $email = '')
    {
        $query = AdminUser::query();
        if ($id !== '') {
            $query->where(['id' => $id]);
        }
        if ($name !== '') {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($email !== '') {
            $query->where('email', 'LIKE', '%' . $email . '%');
        }
        $query->orderBy('id', 'DESC');
        return $query->get();
    }
}
