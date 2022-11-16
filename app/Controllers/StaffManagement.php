<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\UnitsModel;
use App\Models\UserRoleModel;
use Config\Database;

class StaffManagement extends BaseController
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
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as id,nama,email,role,units,is_active,unit_id,role_id,created_at,username');
        $builder->join('user_role', 'users.role_id = user_role.id');
        $builder->join('units', 'users.unit_id = units.id');
        $builder->where('role_id', 3);
        $query = $builder->get();
        $users = $query->getResultArray();

        //Ambil Data User Join Dengan Units
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as id,nama,email,is_active,units,unit_id,role_id,created_at,username');
        $builder->join('units', 'users.unit_id = units.id');
        $builder->where('role_id', 3);
        $query = $builder->get();
        $units = $query->getResultArray();

        //$users = $this->usersModel->findAll();

        //$units = $this->unitsModel->findAll();

        $userRole = $this->userRoleModel->findAll();


        $data = [
            'title' => 'MLBS || Staff Management',
            'menu' => 'staffmanagement',
            'datausers' => $users,
            'datarole' => $userRole,
            'dataunits' => $units,
            'validation' => \Config\Services::validation()
        ];

        return view('staffmanagement/index', $data);
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

    public function updateUser($id)
    {
        //Validasi Form
        if ($this->usersModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'role_id' => $this->request->getVar('role'),
            'unit_id' => $this->request->getVar('units')
        ])) {
            session()->setFlashdata('user', 'Mengupdate User');
            return redirect()->to(base_url('usermanagement'));
        }
    }

    public function deleteUser($id)
    {
        //Hapus Data
        if ($this->usersModel->delete($id)) {
            session()->setFlashdata('user', 'Menghapus User');
            return redirect()->to(base_url('usermanagement'));
        }
    }
}
