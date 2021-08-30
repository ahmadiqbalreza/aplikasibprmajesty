<?php

namespace App\Controllers;

class Admin extends BaseController
{
    protected $db, $table_users, $table_karyawan;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->table_users = $this->db->table('users');
    }

    public function index()
    {
        $data = [
            'title' => 'Admin'
        ];
        echo view('/admin/index', $data);
    }

    public function akun_pengguna()
    {
        // $users = new \Myth\Auth\Models\UserModel();
        // 'users' => $users->findAll()

        $this->table_users->select('users.id as userid, username, email, name');
        $this->table_users->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->table_users->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->table_users->get();
        $data = [
            'title' => 'Akun Pengguna',
            'users' => $query->getResult()
        ];
        echo view('/admin/akun_pengguna', $data);
    }

    public function detail($id = 0)
    {
        $this->table_users->select('users.id as userid, username, department, email, name');
        $this->table_users->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->table_users->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->table_users->where('users.id', $id);
        $query = $this->table_users->get();

        $data = [
            'title' => 'Akun Pengguna',
            'user' => $query->getRow()
        ];

        if (empty($data['user'])) {
            return redirect()->to('/admin');
        }

        echo view('/admin/detail', $data);
    }

    public function tambah_karyawan()
    {
        $data = [
            'title' => 'Tambah Karyawan'
        ];
        echo view('/admin/tambah_karyawan', $data);
    }
}
