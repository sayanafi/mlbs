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
}
