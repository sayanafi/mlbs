<?php

namespace App\Controllers;

use App\Models\StandarPelayananModel;
use App\Models\UnitsModel;
use Config\Database;

class StandarPelayanan extends BaseController
{
    protected $standarPelayananModel;
    protected $unitsModel;

    public function __construct()
    {
        $this->standarPelayananModel = new StandarPelayananModel();
        $this->unitsModel = new UnitsModel();
    }

    public function index()
    {



        //Ambil Data Standar Pelayanan Join Dengan Units
        $db      = \Config\Database::connect();
        $builder = $db->table('standar_pelayanan');
        $builder->select('standar_pelayanan.id as id,nama_dokumensp,file_dokumensp,unit_id,units');
        $builder->join('units', 'standar_pelayanan.unit_id = units.id');
        $query = $builder->get();
        $standarpelayanan = $query->getResultArray();

        $units = $this->unitsModel->findAll();


        $data = [
            'title' => 'MLBS || Staff Management',
            'menu' => 'standarpelayanan',
            'datastandarpelayanan' => $standarpelayanan,
            'dataunits' => $units,
            'validation' => \Config\Services::validation()
        ];

        return view('standarpelayanan/index', $data);
    }

    public function addSP()
    {
        //Tangkap File Nya
        $file = $this->request->getFile('filedokumen');
        //Generate File Random
        $namaFile = $file->getRandomName();
        //Masukkan File Ke Folder
        $file->move('assets/dokumen', $namaFile);

        //Masukkan Ke Database
        if ($this->standarPelayananModel->save([
            'nama_dokumensp' => $this->request->getVar('namadokumen'),
            'file_dokumensp' => $namaFile,
            'unit_id' => $this->request->getVar('units')
        ])) {
            session()->setFlashdata('user', 'Add Dokumen');
            return redirect()->to(base_url('standarpelayanan'));
        }
    }

    public function download($id)
    {
        $dokumen = $this->standarPelayananModel->where(['id' => $id])->first();
        return $this->response->download('assets/dokumen/' . $dokumen['file_dokumensp'], null);
    }

    public function updateSP($id)
    {
        //validasi
        $file = $this->request->getFile('filedokumen');
        $fileLama = $this->request->getVar('filedokumenlama');

        if ($file->getError() == 4) {
            $namaFile = $fileLama;
        } else {
            //Generate File Random
            $namaFile = $file->getRandomName();
            //Masukkan File Ke Folder
            $file->move('assets/dokumen', $namaFile);

            //Hapus File Lama
            unlink("assets/dokumen/$fileLama");
        }

        //Validasi Form
        if ($this->standarPelayananModel->save([
            'id' => $id,
            'nama_dokumensp' => $this->request->getVar('namadokumen'),
            'file_dokumensp' => $namaFile,
            'unit_id' => $this->request->getVar('units')
        ])) {
            session()->setFlashdata('user', 'Mengupdate Dokumen');
            return redirect()->to(base_url('standarpelayanan'));
        }
    }

    public function deleteSP($id)
    {

        $datafile = $this->standarPelayananModel->where(['id' => $id])->first();
        $fileLama = $datafile['file_dokumensp'];

        //Hapus Data
        if ($this->standarPelayananModel->delete($id)) {

            //Hapus File
            unlink("assets/dokumen/$fileLama");

            session()->setFlashdata('user', 'Menghapus Dokumen');
            return redirect()->to(base_url('standarpelayanan'));
        }
    }
}
