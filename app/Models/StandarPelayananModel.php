<?php

namespace App\Models;

use CodeIgniter\Model;

class StandarPelayananModel extends Model
{
    protected $table = 'standar_pelayanan';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama_dokumensp', 'file_dokumensp', 'unit_id'];
}
