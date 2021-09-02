<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = 'table_karyawan';
    protected $useTimestamps = false;
    protected $allowedFields = ['id_karyawan', 'fullname', 'username', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin', 'alamat', 'phone', 'email', 'department'];

    public function getAllkaryawan()
    {
        return $this->findAll();
    }
}
