<?php

namespace App\Controllers;

use App\Models\InventarisModel;
use App\Models\UnitsModel;
use Config\Database;

class Inventaris extends BaseController
{
    protected $inventarisModel;
    protected $unitsModel;

    public function __construct()
    {
        $this->inventarisModel = new InventarisModel();
        $this->unitsModel = new UnitsModel();
    }

    public function index()
    {

        //Cek Apakah Ada Sessionnya
        if (session()->get('logged_in')) {
            //Kalau Ada Cek Apakah Sessionnya Admin
            if (session()->get('role_id') != 2) {
                //Arahkan Ke Halamannya Masing2
                if (session()->get('role_id') == 1) {
                    return redirect()->to(base_url('admin'));
                } else if (session()->get('role_id') == 3) {
                    return redirect()->to(base_url('staff'));
                } else if (session()->get('role_id') == 4) {
                    return redirect()->to(base_url('konsultan'));
                }
            }
        } else {
            return redirect()->to(base_url());
        }

        //Ambil Data Inventaris Join Dengan Units
        $db      = \Config\Database::connect();
        $builder = $db->table('inventaris');
        $builder->select('inventaris.id as id,nama_barang,kode_barang,merk,bahan,unit_id,jumlah,score,units');
        $builder->join('units', 'inventaris.unit_id = units.id');
        $query = $builder->get();
        $inventaris = $query->getResultArray();

        $units = $this->unitsModel->findAll();


        $data = [
            'title' => 'MLBS || Staff Management',
            'menu' => 'inventaris',
            'datainventaris' => $inventaris,
            'dataunits' => $units,
            'validation' => \Config\Services::validation()
        ];

        return view('inventaris/index', $data);
    }

    public function addInventaris()
    {
        //Masukkan Ke Database
        if ($this->inventarisModel->save([
            'nama_barang' => $this->request->getPost('namabarang'),
            'kode_barang' => $this->request->getPost('kodebarang'),
            'merk' => $this->request->getPost('merk'),
            'bahan' => $this->request->getPost('bahan'),
            'jumlah' => $this->request->getPost('jumlah'),
            'score' => $this->request->getPost('score'),
            'unit_id' => $this->request->getPost('units')
        ])) {
            echo 'berhasil';
        }
    }

    public function updateInventaris($id)
    {
        //Validasi Form
        if ($this->inventarisModel->save([
            'id' => $id,
            'nama_barang' => $this->request->getVar('namabarang'),
            'kode_barang' => $this->request->getVar('kodebarang'),
            'merk' => $this->request->getVar('merk'),
            'bahan' => $this->request->getVar('bahan'),
            'jumlah' => $this->request->getVar('jumlah'),
            'score' => $this->request->getVar('score'),
            'unit_id' => $this->request->getVar('units')
        ])) {
            session()->setFlashdata('user', 'Mengupdate Inventaris');
            return redirect()->to(base_url('inventaris'));
        }
    }

    public function deleteInventaris($id)
    {
        //Hapus Data
        if ($this->inventarisModel->delete($id)) {
            session()->setFlashdata('user', 'Menghapus Inventaris');
            return redirect()->to(base_url('inventaris'));
        }
    }
}
