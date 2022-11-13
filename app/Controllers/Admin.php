<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Admin extends BaseController
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        $data = [
            'title' => 'MLBS || Admin Dashboard',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/index', $data);
    }
}
