<?php

namespace App\Models;

use CodeIgniter\Model;

class InputanJuknisModel extends Model
{
    protected $table = 'inputan_juknis';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_juknis', 'prosedur_tetap', 'sikap', 'ucapan', 'pelaksana', 'persyaratan_perlengkapan', 'waktu', 'output', 'penilaian', 'minggu', 'bulan', 'tahun'];
}
