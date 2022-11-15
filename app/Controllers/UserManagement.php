<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\UnitsModel;
use App\Models\UserRoleModel;
use Config\Database;

class UserManagement extends BaseController
{
    protected $usersModel;
    protected $unitsModel;
    protected $userRoleModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->unitsModel = new UnitsModel();
        $this->userRoleModel = new userRoleModel();
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

        $units = $this->unitsModel->findAll();

        $userRole = $this->userRoleModel->findAll();


        $data = [
            'title' => 'MLBS || User Management',
            'menu' => 'usermanagement',
            'datausers' => $users,
            'datarole' => $userRole,
            'dataunits' => $units,
            'validation' => \Config\Services::validation()
        ];




        return view('usermanagement/index', $data);
    }

    public function addUser()
    {
        //Masukkan Ke Database
        if ($this->usersModel->save([
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role_id' => $this->request->getPost('role'),
            'unit_id' => $this->request->getPost('units'),
            'is_active' => 1
        ])) {
            echo 'berhasil';
        }
    }
}
