<?php

namespace App\Controllers;

use App\Models\model_inventaris\BCpkmModel;

class Inventaris extends BaseController
{
    protected $bcpkmmodel;
    public function __construct()
    {
        $this->bcpkmmodel = new BCpkmModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Beranda'
        ];
        echo view('/inventaris/index', $data);
    }


    // Inventaris BPRMGR Batam Center
    public function bc()
    {
        $data = [
            'title' => 'Batam Center'
        ];
        echo view('/inventaris/inv_bc/index', $data);
    }

    public function bc_pkm()
    {
        $data = [
            'title' => 'PKM',
            'db_bcpkm' => $this->bcpkmmodel->getAllbcpkm()
        ];
        echo view('/inventaris/inv_bc/bc_pkm', $data);
    }

    public function ajax_get_bcpkm($nomor_inventaris_pkm)
    {
        $data = $this->bcpkmmodel->getbyNomorinventarisbcpkm($nomor_inventaris_pkm);
        echo json_encode($data);
    }

    public function bcpkm_add()
    {
        $data = [
            'nomor_inventaris_pkm' => $this->request->getPost('nomor_inventaris_pkm'),
            'nomor' => $this->request->getPost('nomor'),
            'tahun' => $this->request->getPost('tahun'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'kategori' => $this->request->getPost('kategori'),
            'jumlah_unit' => $this->request->getPost('jumlah_unit'),
            'lokasi' => $this->request->getPost('lokasi'),
            'lokasi_kantor' => $this->request->getPost('lokasi_kantor'),
            'image' => $this->request->getPost('imagee'),
            'remark' => $this->request->getPost('remark'),
            'update_by' => user()->fullname,
            'last_update' => date('Y-m-d H:i:s'),
        ];
        $this->bcpkmmodel->insert($data);
        echo json_encode(array("status" => TRUE));
    }

    public function bcpkm_update()
    {
        $data = [
            'nomor_inventaris_pkm' => $this->request->getPost('nomor_inventaris_pkm'),
            'nomor' => $this->request->getPost('nomor'),
            'tahun' => $this->request->getPost('tahun'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'kategori' => $this->request->getPost('kategori'),
            'jumlah_unit' => $this->request->getPost('jumlah_unit'),
            'lokasi' => $this->request->getPost('lokasi'),
            'lokasi_kantor' => $this->request->getPost('lokasi_kantor'),
            'image' => $this->request->getPost('imagee'),
            'remark' => $this->request->getPost('remark'),
            'update_by' => user()->fullname,
            'last_update' => date('Y-m-d H:i:s'),
        ];
        $this->bcpkmmodel->where('nomor_inventaris_pkm', $this->request->getPost('nomor_inventaris_pkm'))->set($data)->update();
        echo json_encode(array("status" => TRUE));
    }

    public function bcpkm_delete($nomor_inventaris_pkm)
    {
        $this->bcpkmmodel->where('nomor_inventaris_pkm', $nomor_inventaris_pkm)->delete();
        echo json_encode(array("status" => TRUE));
    }

    public function bc_prk()
    {
        $data = [
            'title' => 'PRK'
        ];
        echo view('/inventaris/inv_bc/bc_prk', $data);
    }

    public function bc_fno()
    {
        $data = [
            'title' => 'FNO'
        ];
        echo view('/inventaris/inv_bc/bc_fno', $data);
    }

    public function bc_fnb()
    {
        $data = [
            'title' => 'FNB'
        ];
        echo view('/inventaris/inv_bc/bc_fnb', $data);
    }
    // ==============================

}
