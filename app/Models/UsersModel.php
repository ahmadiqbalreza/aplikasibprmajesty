<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'email', 'id_karyawan', 'username', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at', 'fullname', 'department', 'jenis_kelamin', 'tgl_lahir', 'status_karyawan', 'phone',
    ];

    public function getAllusers()
    {
        return $this->findAll();
    }
}
