<?php

namespace App\Models;

use PicoPHP\Base\Model;

class UserModel extends Model {
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'username',
        'password',
        'created_at'
    ];
}
