<?php

namespace App\Models;

use CodeIgniter\Model;

class InventarisModel extends Model
{
    protected $table = 'inventaris';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama_barang', 'kode_barang', 'merk', 'bahan', 'jumlah', 'score', 'unit_id'];
}
