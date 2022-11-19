<?php

namespace App\Models;

use CodeIgniter\Model;

class SPOModel extends Model
{
    protected $table = 'spo';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama_spo', 'no_spo', 'unit_id', 'user_id'];
}
