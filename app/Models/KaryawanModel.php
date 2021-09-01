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

    public function getNomorsurat($variabel)
    {
        return $this->find($variabel);
    }

    public function getLastcountsurat()
    {
        $lastrow = $this->orderBy('id', 'DESC')->first();
        $counts = $lastrow['count'];
        return $counts;
    }

    public function getLasttahunsurat()
    {
        $lastrow = $this->orderBy('id', 'DESC')->first();
        $tahun = $lastrow['tahun'];
        return $tahun;
    }

    public function getLastnomorsurat()
    {
        $lastrow = $this->orderBy('id', 'DESC')->first();
        $nomor_surat = $lastrow['nomor_surat'];
        return $nomor_surat;
    }

    public function getLastsurat()
    {
        $lastrowsurat = $this->orderBy('id', 'DESC')->first();
        return $lastrowsurat;
    }
}
