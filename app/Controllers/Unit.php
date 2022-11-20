<?php

namespace App\Controllers;

use App\Models\UnitsModel;
use Config\Database;

class Unit extends BaseController
{

    protected $unitsModel;

    public function __construct()
    {
        $this->unitsModel = new UnitsModel();
    }

    public function index()
    {

        //Cek Apakah Ada Sessionnya
        if (session()->get('logged_in')) {
            //Kalau Ada Cek Apakah Sessionnya Admin
            if (session()->get('role_id') != 2 and session()->get('role_id') != 4) {
                //Arahkan Ke Halamannya Masing2
                if (session()->get('role_id') == 1) {
                    return redirect()->to(base_url('admin'));
                } else if (session()->get('role_id') == 3) {
                    return redirect()->to(base_url('staff'));
                }
            }
        } else {
            return redirect()->to(base_url());
        }

        $units = $this->unitsModel->findAll();


        $data = [
            'title' => 'MLBS || Unit',
            'menu' => 'unit',
            'dataunits' => $units,
            'validation' => \Config\Services::validation()
        ];

        return view('unit/index', $data);
    }

    public function addUnit()
    {
        //Masukkan Ke Database
        if ($this->unitsModel->save([
            'units' => $this->request->getPost('namaunit')
        ])) {
            echo 'berhasil';
        }
    }

    public function updateUnit($id)
    {
        //Validasi Form
        if ($this->unitsModel->save([
            'id' => $id,
            'units' => $this->request->getVar('namaunit')
        ])) {
            session()->setFlashdata('user', 'Mengupdate Unit');
            return redirect()->to(base_url('unit'));
        }
    }

    public function deleteUnit($id)
    {
        //Hapus Data
        if ($this->unitsModel->delete($id)) {
            session()->setFlashdata('user', 'Menghapus Unit');
            return redirect()->to(base_url('unit'));
        }
    }
}
