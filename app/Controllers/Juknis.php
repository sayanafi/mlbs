<?php

namespace App\Controllers;

use App\Models\JuknisModel;
use App\Models\UnitsModel;
use Config\Database;

class Juknis extends BaseController
{
    protected $juknisModel;
    protected $unitsModel;

    public function __construct()
    {
        $this->juknisModel = new JuknisModel();
        $this->unitsModel = new UnitsModel();
    }

    public function index()
    {

        //Cek Apakah Ada Sessionnya
        if (session()->get('logged_in')) {
            //Kalau Ada Cek Apakah Sessionnya 
            if (session()->get('role_id') == 1) {
                return redirect()->to(base_url('admin'));
            }
        } else {
            return redirect()->to(base_url());
        }

        //Ambil Data Inventaris Join Dengan Units
        $db      = \Config\Database::connect();
        $builder = $db->table('juknis');
        $builder->select('*,juknis.id as id');
        $builder->join('inputan_juknis', 'juknis.inputan_id = inputan_juknis.id');
        $query = $builder->get();
        $juknis = $query->getResultArray();
        $units = $this->unitsModel->findAll();


        $data = [
            'title' => 'MLBS || Staff Management',
            'menu' => 'juknis',
            'datajuknis' => $juknis,
            'dataunits' => $units,
            'validation' => \Config\Services::validation()
        ];

        return view('juknis/index', $data);
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
