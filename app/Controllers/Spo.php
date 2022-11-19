<?php

namespace App\Controllers;

use App\Models\UnitsModel;
use App\Models\SPOModel;
use Config\Database;

class Spo extends BaseController
{

    protected $unitsModel;
    protected $spoModel;

    public function __construct()
    {
        $this->unitsModel = new UnitsModel();
        $this->spoModel = new SPOModel();
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

        //Ambil Data SPO Join Dengan User Dan Unit
        $db      = \Config\Database::connect();
        $builder = $db->table('spo');
        $builder->select('spo.id as id,nama,units,nama_spo,no_spo,spo.unit_id as unit_id');
        $builder->join('users', 'spo.user_id = users.id');
        $builder->join('units', 'spo.unit_id = units.id');
        $query = $builder->get();
        $spo = $query->getResultArray();

        $units = $this->unitsModel->findAll();


        $data = [
            'title' => 'MLBS || SPO',
            'menu' => 'spo',
            'dataunits' => $units,
            'dataspo' => $spo,
            'validation' => \Config\Services::validation()
        ];

        return view('spo/index', $data);
    }

    public function addspo()
    {
        //Masukkan Ke Database
        if ($this->spoModel->save([
            'nama_spo' => $this->request->getPost('namaspo'),
            'no_spo' => $this->request->getPost('nospo'),
            'unit_id' => $this->request->getPost('units'),
            'user_id' => session()->get('id')
        ])) {
            echo 'berhasil';
        }
    }

    public function updatespo($id)
    {
        //Validasi Form
        if ($this->spoModel->save([
            'id' => $id,
            'nama_spo' => $this->request->getVar('namaspo'),
            'no_spo' => $this->request->getVar('nospo'),
            'unit_id' => $this->request->getVar('units')
        ])) {
            session()->setFlashdata('user', 'Mengupdate SPO');
            return redirect()->to(base_url('spo'));
        }
    }

    public function deletespo($id)
    {
        //Hapus Data
        if ($this->spoModel->delete($id)) {
            session()->setFlashdata('user', 'Menghapus SPO');
            return redirect()->to(base_url('spo'));
        }
    }
}
