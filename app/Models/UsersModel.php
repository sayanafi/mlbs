<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'email', 'password', 'username', 'role_id', 'unit_id', 'is_active'];
}
