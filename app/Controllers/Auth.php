<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'MLBS || Login Page',
            'validation' => \Config\Services::validation()
        ];

        return view('auth/login', $data);
    }
}
