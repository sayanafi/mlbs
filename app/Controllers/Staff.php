<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Staff extends BaseController
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function index()
    {

        //Cek Apakah Ada Sessionnya
        if (session()->get('logged_in')) {
            //Kalau Ada Cek Apakah Sessionnya Admin
            if (session()->get('role_id') != 3) {
                //Arahkan Ke Halamannya Masing2
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
        $data = [
            'title' => 'MLBS || Staff Dashboard',
            'menu' => 'dashboard',
            'validation' => \Config\Services::validation()
        ];

        return view('staff/index', $data);
    }
}
