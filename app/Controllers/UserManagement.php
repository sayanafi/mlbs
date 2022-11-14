<?php

namespace App\Controllers;

use App\Models\UsersModel;
use Config\Database;

class UserManagement extends BaseController
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function index()
    {

        //Ambil Data User Join Dengan Role
        // $db      = \Config\Database::connect();
        // $builder = $db->table('users');
        // $builder->select('users.id as id,nama,email,role,is_active,unit_id');
        // $builder->join('user_role', 'users.role_id = user_role.id');
        // $query = $builder->get();
        // $users = $query->getResultArray();

        $users = $this->usersModel->findAll();

        $data = [
            'title' => 'MLBS || User Management',
            'menu' => 'usermanagement',
            'datausers' => $users,
            'validation' => \Config\Services::validation()
        ];




        return view('usermanagement/index', $data);
    }
}
