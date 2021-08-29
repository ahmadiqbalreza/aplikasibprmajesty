<?php

namespace App\Models\model_nomor_surat;

use CodeIgniter\Model;

class NomorsuratModel extends Model
{
    protected $table = 'tabel_nomor_surat';
    protected $useTimestamps = false;
    protected $allowedFields = ['no', 'nmr', 'count', 'nomor_surat', 'tahun', 'perihal_surat', 'tujuan_surat', 'id_pegawai', 'nama_pegawai', 'department_pegawai', 'tanggal_dibuat', 'konfirmasi'];

    public function getAllnomorsurat()
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
