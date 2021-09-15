<?php

namespace App\Models\model_inventaris;

use CodeIgniter\Model;

class BCpkmModel extends Model
{
    protected $table = 'inventaris_bc_pkm';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'nomor_inventaris_pkm', 'nomor', 'tahun', 'deskripsi', 'kategori', 'jumlah_unit', 'lokasi', 'lokasi_kantor', 'image', 'remark', 'update_by', 'last_update'
    ];

    public function getAllbcpkm()
    {
        return $this->findAll();
    }
}
