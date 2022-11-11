<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Auth extends BaseController
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        $data = [
            'title' => 'MLBS || Login Page',
            'validation' => \Config\Services::validation()
        ];

        return view('auth/login', $data);
    }

    public function registerSave()
    {

        $password = 'nafi123';
        //Masukkan Database
        if ($this->usersModel->save([
            'nama' => 'Aqil Mustaqim',
            'username' => 'nafi',
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'email' => 'aqilmustaqim28@gmail.com',
            'role_id' => 2,
            'unit_id' => 1,
            'is_active' => 1
        ])) {
            return 'Success';
        }
    }

    public function loginSave()
    {
        //Validasi
        if (!$this->validate([
            //Field Yang mau divalidasi
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi ! '
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi ! '
                ]
            ]
        ])) {
            //Kalau tidak tervalidasi
            return redirect()->to(base_url())->withInput();
        }

        //Kalau Lolos Validasi
        //1. Cek Apakah Ada Usernya
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $this->usersModel->where(['username' => $username])->first();

        if ($user) {
            //Kalau ada user cek apakah passwordnya bener
            if (password_verify($password, $user['password'])) {
                //Kalau Benar cek apakah usernya aktif
                if ($user['is_active'] == 1) {

                    //Kalau Aktif
                    // 1. Simpan sessionnya
                    $dataSession = [
                        'nama' => $user['nama'],
                        'username' => $user['username'],
                        'role_id' => $user['role_id'],
                        'logged_in' => TRUE
                    ];
                    //2. Redirect Ke Halaman Role ID Masing Masing
                    if ($user['role_id'] == 1) {
                        return redirect()->to(base_url('admin'));
                    } else if ($user['role_id'] == 2) {
                        return redirect()->to(base_url('manajemen'));
                    } else if ($user['role_id'] == 3) {
                        return redirect()->to(base_url('staff'));
                    } else if ($user['role_id'] == 4) {
                        return redirect()->to(base_url('konsultan'));
                    }
                } else {
                    session()->setFlashdata('login', 'Akun Anda Tidak Aktif ! ');
                    return redirect()->to(base_url());
                }
            } else {
                //Kalau Passwordnya salah
                session()->setFlashdata('login', 'Password Salah ! ');
                return redirect()->to(base_url());
            }
        } else {
            //kalau ga ada kasih alert
            session()->setFlashdata('login', 'Username Tidak Terdaftar ! ');
            return redirect()->to(base_url());
        }
    }

    public function logout()
    {
        //Hapus Session
        $dataSession = [
            'nama',
            'role_id',
            'logged_in'
        ];
        session()->remove($dataSession);
        return redirect()->to(base_url());
    }
}
