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
        // $db      = \Config\Database::connect();
        // $builder = $db->table('juknis');
        // $builder->select('*,juknis.id as id');
        // $builder->join('inputan_juknis', 'juknis.id = inputan_juknis.id_juknis');
        // $query = $builder->get();
        // $juknis = $query->getResultArray();

        //Data Juknis
        $juknis = $this->juknisModel->findAll();
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

    public function addJuknis()
    {

        //Tangkap File Nya
        $file = $this->request->getFile('filejuknis');
        //Generate File Random
        $namaFile = $file->getRandomName();
        //Masukkan File Ke Folder
        $file->move('assets/juknis', $namaFile);

        //Masukkan Ke Database
        if ($this->juknisModel->save([
            'nama_juknis' => $this->request->getVar('namajuknis'),
            'no_juknis' => $this->request->getVar('nojuknis'),
            'tanggal_dibuat' => $this->request->getVar('tanggaldibuat'),
            'tanggal_disahkan' => $this->request->getVar('tanggaldisahkan'),
            'pengertian' => $this->request->getVar('pengertian'),
            'dasar_hukum' => $this->request->getVar('dasarhukum'),
            'kebijakan_ketentuan' => $this->request->getVar('kebijakanketentuan'),
            'unit_pihakterkait' => $this->request->getVar('unitpihakterkait'),
            'catatan' => $this->request->getVar('catatan'),
            'file_juknis' => $namaFile,
            'user_created' => session()->get('nama')
        ])) {
            session()->setFlashdata('user', 'Add Juknis');
            return redirect()->to(base_url('juknis'));
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
