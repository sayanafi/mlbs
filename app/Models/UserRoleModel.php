<?php

namespace App\Models;

use CodeIgniter\Model;

class UserRoleModel extends Model
{
    protected $table = 'user_role';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $allowedFields = ['role'];
}
