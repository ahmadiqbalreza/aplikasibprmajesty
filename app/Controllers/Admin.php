<?php

namespace App\Controllers;

class Admin extends BaseController
{
    protected $db, $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    public function index()
    {
        $data = [
            'title' => 'Admin | APLIKASI BPRMGR'
        ];
        echo view('/admin/index', $data);
    }

    public function akun_pengguna()
    {
        // $users = new \Myth\Auth\Models\UserModel();
        // 'users' => $users->findAll()

        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();
        $data = [
            'title' => 'Admin | APLIKASI BPRMGR',
            'users' => $query->getResult()
        ];
        echo view('/admin/akun_pengguna', $data);
    }

    public function detail($id = 0)
    {
        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();
        $data = [
            'title' => 'Admin | APLIKASI BPRMGR',
            'user' => $query->getRow()
        ];

        if (empty($data['user'])) {
            return redirect()->to('/admin');
        }

        echo view('/admin/detail', $data);
    }
}
