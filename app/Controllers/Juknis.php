<?php

namespace App\Controllers;

use App\Database\Migrations\InputanJuknis;
use App\Models\InputanJuknisModel;
use App\Models\JuknisModel;
use App\Models\UnitsModel;
use Config\Database;

class Juknis extends BaseController
{
    protected $juknisModel;
    protected $unitsModel;
    protected $inputanJuknisModel;

    public function __construct()
    {
        $this->juknisModel = new JuknisModel();
        $this->unitsModel = new UnitsModel();
        $this->inputanJuknisModel = new InputanJuknisModel();
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

        if (session()->get('role_id') != 4) {

            //Ambil Data Juknis Join Dengan Units
            $db      = \Config\Database::connect();
            $builder = $db->table('juknis');
            $builder->select('*,juknis.id as id');
            $builder->join('units', 'juknis.unit_pihakterkait = units.id');
            $query = $builder->get();
            $juknis = $query->getResultArray();

            //Data Juknis
            //$juknis = $this->juknisModel->findAll();
            $units = $this->unitsModel->findAll();


            $data = [
                'title' => 'MLBS || Staff Management',
                'menu' => 'juknis',
                'datajuknis' => $juknis,
                'dataunits' => $units,
                'validation' => \Config\Services::validation()
            ];

            return view('juknis/index', $data);
        } else {
            $units = $this->unitsModel->findAll();
            $data = [
                'title' => 'MLBS || Staff Management',
                'menu' => 'juknis',
                'dataunits' => $units,
                'validation' => \Config\Services::validation()
            ];

            return view('juknis/nilaiJuknis', $data);
        }
    }

    public function addJuknis()
    {

        //Validasi Role
        if (session()->get('logged_in')) {
            if (session()->get('role_id') != 3) {
                //Kalau Yang login bukan staff tendang
                if (session()->get('role_id') == 1) {
                    return redirect()->to(base_url('admin'));
                } else if (session()->get('role_id') == 2) {
                    return redirect()->to(base_url('manajemen'));
                } else if (session()->get('role_id') == 4) {
                    return redirect()->to(base_url('konsultan'));
                }
            }
        } else {
            return redirect()->to(base_url());
        }

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
            'tujuan' => $this->request->getVar('tujuan'),
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

    public function updateJuknis($id)
    {

        //Validasi Role
        if (session()->get('logged_in')) {
            if (session()->get('role_id') != 3) {
                //Kalau Yang login bukan staff tendang
                if (session()->get('role_id') == 1) {
                    return redirect()->to(base_url('admin'));
                } else if (session()->get('role_id') == 2) {
                    return redirect()->to(base_url('manajemen'));
                } else if (session()->get('role_id') == 4) {
                    return redirect()->to(base_url('konsultan'));
                }
            }
        } else {
            return redirect()->to(base_url());
        }

        //validasi
        $file = $this->request->getFile('filejuknis');
        $fileLama = $this->request->getVar('filejuknislama');

        if ($file->getError() == 4) {
            $namaFile = $fileLama;
        } else {
            //Generate File Random
            $namaFile = $file->getRandomName();
            //Masukkan File Ke Folder
            $file->move('assets/juknis', $namaFile);


            if ($fileLama != null) {
                //Hapus File Lama
                unlink("assets/juknis/$fileLama");
            }
        }
        //Validasi Form
        if ($this->juknisModel->save([
            'id' => $id,
            'nama_juknis' => $this->request->getVar('namajuknis'),
            'no_juknis' => $this->request->getVar('nojuknis'),
            'tanggal_dibuat' => $this->request->getVar('tanggaldibuat'),
            'tanggal_disahkan' => $this->request->getVar('tanggaldisahkan'),
            'pengertian' => $this->request->getVar('pengertian'),
            'dasar_hukum' => $this->request->getVar('dasarhukum'),
            'tujuan' => $this->request->getVar('tujuan'),
            'kebijakan_ketentuan' => $this->request->getVar('kebijakanketentuan'),
            'unit_pihakterkait' => $this->request->getVar('unitpihakterkait'),
            'catatan' => $this->request->getVar('catatan'),
            'file_juknis' => $namaFile,
            'user_created' => session()->get('nama')
        ])) {
            session()->setFlashdata('user', 'Mengupdate Juknis');
            return redirect()->to(base_url('juknis'));
        }
    }

    public function deleteJuknis($id)
    {

        //Validasi Role
        if (session()->get('logged_in')) {
            if (session()->get('role_id') != 3) {
                //Kalau Yang login bukan staff tendang
                if (session()->get('role_id') == 1) {
                    return redirect()->to(base_url('admin'));
                } else if (session()->get('role_id') == 2) {
                    return redirect()->to(base_url('manajemen'));
                } else if (session()->get('role_id') == 4) {
                    return redirect()->to(base_url('konsultan'));
                }
            }
        } else {
            return redirect()->to(base_url());
        }
        //Hapus Data
        $datafile = $this->juknisModel->where(['id' => $id])->first();
        $fileLama = $datafile['file_juknis'];

        //Data Detail Juknis
        $detailJuknis = $this->inputanJuknisModel->where(['id_juknis' => $id])->findAll();

        //Hapus Data
        if ($this->juknisModel->delete($id)) {

            //Hapus Juga Detail Yang Terkait Dengan Juknis
            foreach ($detailJuknis as $dj) {
                $this->inputanJuknisModel->delete($dj['id']);
            }

            //Hapus File
            unlink("assets/juknis/$fileLama");

            session()->setFlashdata('user', 'Menghapus Juknis');
            return redirect()->to(base_url('juknis'));
        }
    }

    public function deleteDetailJuknis($id)
    {

        //Validasi Role
        if (session()->get('logged_in')) {
            if (session()->get('role_id') != 3) {
                //Kalau Yang login bukan staff tendang
                if (session()->get('role_id') == 1) {
                    return redirect()->to(base_url('admin'));
                } else if (session()->get('role_id') == 2) {
                    return redirect()->to(base_url('manajemen'));
                } else if (session()->get('role_id') == 4) {
                    return redirect()->to(base_url('konsultan'));
                }
            }
        } else {
            return redirect()->to(base_url());
        }

        //Hapus Data
        if ($this->inputanJuknisModel->delete($id)) {
            session()->setFlashdata('user', 'Menghapus Detail Juknis');
            return redirect()->to(base_url('juknis'));
        }
    }

    public function detailJuknis()
    {

        //Validasi Role
        if (session()->get('logged_in')) {
            if (session()->get('role_id') != 3) {
                //Kalau Yang login bukan staff tendang
                if (session()->get('role_id') == 1) {
                    return redirect()->to(base_url('admin'));
                } else if (session()->get('role_id') == 2) {
                    return redirect()->to(base_url('manajemen'));
                } else if (session()->get('role_id') == 4) {
                    return redirect()->to(base_url('konsultan'));
                }
            }
        } else {
            return redirect()->to(base_url());
        }

        //Cek Apakah Ada Sessionnya
        if (session()->get('logged_in')) {
            //Kalau Ada Cek Apakah Sessionnya 
            if (session()->get('role_id') == 1) {
                return redirect()->to(base_url('admin'));
            }
        } else {
            return redirect()->to(base_url());
        }

        $juknis = $this->juknisModel->findAll();


        $data = [
            'title' => 'MLBS || Staff Management',
            'menu' => 'juknis',
            'juknis' => $juknis,
            'validation' => \Config\Services::validation()
        ];

        return view('juknis/detailJuknis', $data);
    }

    public function detailJuknis2($id)
    {

        //Validasi Role
        if (session()->get('logged_in')) {
            if (session()->get('role_id') != 3) {
                //Kalau Yang login bukan staff tendang
                if (session()->get('role_id') == 1) {
                    return redirect()->to(base_url('admin'));
                } else if (session()->get('role_id') == 2) {
                    return redirect()->to(base_url('manajemen'));
                } else if (session()->get('role_id') == 4) {
                    return redirect()->to(base_url('konsultan'));
                }
            }
        } else {
            return redirect()->to(base_url());
        }

        $juknis = $this->juknisModel->where(['id' => $id])->first();
        $detailJuknis = $this->inputanJuknisModel->where(['id_juknis' => $id])->findAll();



        $data = [
            'title' => 'MLBS || Staff Management',
            'menu' => 'juknis',
            'juknis' => $juknis['nama_juknis'],
            'detailjuknis' => $detailJuknis,
            'validation' => \Config\Services::validation()
        ];

        return view('juknis/detailJuknis2', $data);
    }

    public function addDetailJuknis()
    {
        $prosedurtetap = $this->request->getVar('prosedurtetap');
        $sikap = $this->request->getVar('sikap');
        $ucapan = $this->request->getVar('ucapan');
        $pelaksana = $this->request->getVar('pelaksana');
        $persyaratanperlengkapan = $this->request->getVar('persyaratanperlengkapan');
        $waktu = $this->request->getVar('waktu');
        $output = $this->request->getVar('output');
        $juknis = $this->request->getVar('juknis');

        $jmldata = count($prosedurtetap);

        for ($i = 0; $i < $jmldata; $i++) {
            $this->inputanJuknisModel->save([
                'id_juknis' => $juknis,
                'prosedur_tetap' => $prosedurtetap[$i],
                'sikap' => $sikap[$i],
                'ucapan' => $ucapan[$i],
                'pelaksana' => $pelaksana[$i],
                'persyaratan_perlengkapan' => $persyaratanperlengkapan[$i],
                'waktu' => $waktu[$i],
                'output' => $output[$i]
            ]);
        }
        $msg = [
            'sukses' => "$jmldata Data Juknis Berhasil Di Simpan"
        ];

        echo json_encode($msg);
        session()->setFlashdata('user', 'Menambah Detail Juknis');
        return redirect()->to(base_url('juknis'));
    }

    public function nilaiActionJuknis($id)
    {

        //Ambil Data Juknis Join Dengan Units
        $db      = \Config\Database::connect();
        $builder = $db->table('juknis');
        $builder->select('juknis.id as id,units,unit_pihakterkait,nama_juknis');
        $builder->join('units', 'juknis.unit_pihakterkait = units.id');
        $builder->where('unit_pihakterkait', $id);
        $query = $builder->get();
        $juknis = $query->getResultArray();
        $data = [
            'title' => 'MLBS || Staff Management',
            'menu' => 'juknis',
            'juknis' => $juknis,
            'validation' => \Config\Services::validation()
        ];

        return view('juknis/nilaiActionJuknis', $data);
    }

    public function viewNilaiJuknis($idjuknis)
    {

        //$juknis = $this->juknisModel->where(['id' => $idjuknis])->first();
        $db      = \Config\Database::connect();
        $builder = $db->table('juknis');
        $builder->select('*,juknis.id as id');
        $builder->join('units', 'juknis.unit_pihakterkait = units.id');
        $builder->where('juknis.id', $idjuknis);
        $query = $builder->get();
        $juknis = $query->getRowArray();

        //Ambil Data Juknis Join Dengan Units
        $db      = \Config\Database::connect();
        $builder = $db->table('inputan_juknis');
        $builder->select('*,inputan_juknis.id as id');
        $builder->join('juknis', 'inputan_juknis.id_juknis = juknis.id');
        $builder->where('id_juknis', $idjuknis);
        $query = $builder->get();
        $detailjuknis = $query->getResultArray();

        $data = [
            'title' => 'MLBS || Staff Management',
            'menu' => 'juknis',
            'juknis' => $juknis,
            'detailjuknis' => $detailjuknis,
            'validation' => \Config\Services::validation()
        ];

        return view('juknis/viewNilaiJuknis', $data);
    }

    public function addNilaiJuknis()
    {
        $minggu = $this->request->getVar('minggu');
        $bulan = $this->request->getVar('bulan');
        $tahun = $this->request->getVar('tahun');
        $penilaian = $this->request->getVar('penilaian');
        $id = $this->request->getVar('idInputanJuknis');

        $jmldata = count($id);


        for ($i = 0; $i < $jmldata; $i++) {
            $this->inputanJuknisModel->save([
                'id' => $id[$i],
                'minggu' => $minggu,
                'bulan' => $bulan,
                'tahun' => $tahun,
                'penilaian' => $penilaian[$i]
            ]);
        }
        session()->setFlashdata('user', 'Nilai Juknis');
        return redirect()->to(base_url('juknis'));
    }
}
