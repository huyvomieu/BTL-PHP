<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'tbluser';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    protected $fillable = [
        'user_fullname',
        'user_address',
        'user_email',
        'user_phone',
        'user_loginname',
        'user_password',
        'user_created_date',
        'user_enabled',
        'user_deleted',
    ];

    public function getAuthPassword()
    {
        return $this->user_password;
    }
}
