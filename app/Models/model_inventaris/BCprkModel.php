<?php

namespace App\Models\model_inventaris;

use CodeIgniter\Model;

class BCprkModel extends Model
{
    protected $table = 'inventaris_bc_prk';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'nomor_inventaris_prk', 'nomor', 'tahun', 'deskripsi', 'kategori', 'jumlah_unit', 'lokasi', 'lokasi_kantor', 'image', 'remark', 'keterangan_lain', 'update_by', 'last_update'
    ];

    public function getAllbcprk()
    {
        $this->select('nomor_inventaris_prk,nomor, tahun,deskripsi,kategori,jumlah_unit,lokasi,lokasi_kantor,image,remark,keterangan_lain,update_by,last_update')->orderBy('nomor', 'ASC');
        $query = $this->get();
        return $query->getResult();
    }

    public function getNomorterakhir()
    {
        $this->select('nomor_inventaris_prk,nomor, tahun,deskripsi,kategori,jumlah_unit,lokasi,lokasi_kantor,image,remark,keterangan_lain,update_by,last_update')->orderBy('nomor', 'DESC');
        $query = $this->get();
        return $query->getResult();
    }

    public function getbyNomorinventarisbcprk($nomor_inventaris)
    {
        $this->select('nomor_inventaris_prk,nomor, tahun,deskripsi,kategori,jumlah_unit,lokasi,lokasi_kantor,image,remark,keterangan_lain,update_by,last_update');
        $this->where('nomor_inventaris_prk', $nomor_inventaris);
        $query = $this->get();
        return $query->getResult();
    }

    public function getImagename($nomor_inventaris)
    {
        return $this->where('nomor_inventaris_prk', $nomor_inventaris)->findAll();
    }
}
