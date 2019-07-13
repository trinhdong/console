<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

/**
 * Class User
 * @package App
 * @property int $id;
 * @property string $name;
 * @property string $email;
 * @property string $password;
 * @property string $address;
 * @property string $phone;
 * @property string $note;
 * @property bool $sex;
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id';
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getUserInfoByUserId($id)
    {
        return DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*',  'orders.id as order_id', 'orders.total_price as order_total', 'orders.status as order_status')
            ->where('users.id', '=', $id)
            ->first();
    }

    public function orders()
    {
        return $this->hasMany('App\Order', 'user_id', 'id');
    }
}
