<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use App\Models\DepartmentModel;
use App\Models\RoleModel;
use App\Models\UsersModel;
use App\Models\GroupsusersModel;

class Admin extends BaseController
{
    protected $db, $table_users, $table_karyawan;
    protected $karyawanmodel;
    protected $departmentmodel;
    protected $rolemodel;
    protected $usersmodel;
    protected $groupsusersmodel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->table_users = $this->db->table('users');
        $this->karyawanmodel = new KaryawanModel();
        $this->departmentmodel = new DepartmentModel();
        $this->rolemodel = new RoleModel();
        $this->usersmodel = new UsersModel();
        $this->groupsusersmodel = new GroupsusersModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin'
        ];
        echo view('/admin/index', $data);
    }

    public function add_akun()
    {
        $data = [
            'title' => 'Add Akun',
            'department' => $this->departmentmodel->getAlldepartment(),
            'role' => $this->rolemodel->getAllrole()
        ];
        echo view('/admin/add_akun', $data);
    }
}
