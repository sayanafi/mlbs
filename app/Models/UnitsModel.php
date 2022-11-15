<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitsModel extends Model
{
    protected $table = 'units';
    protected $primaryKey = 'id';

    protected $allowedFields = ['units'];
}
