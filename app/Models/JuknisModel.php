<?php

namespace App\Models;

use CodeIgniter\Model;

class JuknisModel extends Model
{
    protected $table = 'juknis';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama_juknis', 'no_juknis', 'tanggal_dibuat', 'tanggal_disahkan', 'pengertian', 'tujuan', 'dasar_hukum', 'kebijakan_ketentuan', 'unit_pihakterkait', 'catatan', 'file_juknis', 'user_created'];
}
