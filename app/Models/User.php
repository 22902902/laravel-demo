<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    // 1.用户模型关联表
    public $table = 'users';

    public $primaryKey = 'id';


    /**
     * 3.允许被批量操作的字段
     *
     * The attributes that are mass assignable.
     *
     * 可以没有不允许的字段
     * public $guarded = [];
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username', // 得加这一个要不然添加用户时候username是空的
        'email',
        'password',
    ];
    //public $guarded = [];

    /**
     * 4.是否维护crated_at 和 updated_at字段
     * 禁用时间戳,有这俩字段，没必要禁
     */
    // public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 添加动态属性，关联权限模型
    public function role() {
        // 关联Permission模型，关联表表名，当前模型在关联表中的主键,被关联模型在关联表上的主键
        return $this->belongsToMany('App\Models\Role','user_role','user_id','role_id');
    }



    // Rest omitted for brevity  --- JWTSubject方法
    // 2.关联表的主键

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

}
