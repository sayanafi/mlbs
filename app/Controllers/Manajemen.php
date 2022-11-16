<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Manajemen extends BaseController
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        $data = [
            'title' => 'MLBS || Manajemen Dashboard',
            'menu' => 'dashboard',
            'validation' => \Config\Services::validation()
        ];

        return view('manajemen/index', $data);
    }
}
