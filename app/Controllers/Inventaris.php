<?php

namespace App\Controllers;

use App\Models\model_inventaris\BCpkmModel;
use phpDocumentor\Reflection\PseudoTypes\True_;

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
            'db_bcpkm' => $this->bcpkmmodel->getAllbcpkm(),
            'validation' => \Config\Services::validation()
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
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate(
                [
                    'nomor_inventaris_pkm' => [
                        'rules' => 'required|is_unique[inventaris_bc_pkm.nomor_inventaris_pkm]',
                        'errors' => [
                            'required' => 'Tahun dan Nomor harus diisi dahulu!',
                            'is_unique' => 'Nomor Inventaris sudah ada di database!',
                        ]
                    ],
                    'inp_foto_barang' => 'uploaded[inp_foto_barang]|max_size[inp_foto_barang,2048]|is_image[inp_foto_barang]|mime_in[inp_foto_barang,image/jpg,image/jpeg,image/png]',
                    'nomor' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Nomor harus diisi!',
                        ]
                    ],
                    'tahun' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Tahun harus diisi!',
                        ]
                    ],
                    'deskripsi' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Deskripsi harus diisi!',
                        ]
                    ],
                    'kategori' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Kategori harus diisi!',
                        ]
                    ],
                    'jumlah_unit' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Jumlah Unit harus diisi!',
                        ]
                    ],
                    'lokasi' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Lokasi harus diisi!',
                        ]
                    ],
                    'lokasi_kantor' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Lokasi Kantor harus diisi!',
                        ]
                    ],
                    'remark' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Remark harus diisi!',
                        ]
                    ],
                ]
            );

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nomor_inventaris_pkm' => $validation->getError('nomor_inventaris_pkm'),
                        'inp_foto_barang' => $validation->getError('inp_foto_barang'),
                        'nomor' => $validation->getError('nomor'),
                        'tahun' => $validation->getError('tahun'),
                        'deskripsi' => $validation->getError('deskripsi'),
                        'kategori' => $validation->getError('kategori'),
                        'jumlah_unit' => $validation->getError('jumlah_unit'),
                        'lokasi' => $validation->getError('lokasi'),
                        'lokasi_kantor' => $validation->getError('lokasi_kantor'),
                        'remark' => $validation->getError('remark'),
                    ]
                ];
                echo json_encode($msg);
            } else {
                $file_foto_barang = $this->request->getFile('inp_foto_barang');
                $nmr_inv = $this->request->getPost('nomor_inventaris_pkm');
                $ext = $file_foto_barang->getClientExtension();
                $nama_foto_barang = "$nmr_inv.$ext";
                if ($file_foto_barang->move('img/inventaris/bc/pkm/', $nama_foto_barang)) {
                    $thumbnail_path = "img/inventaris/bc/pkm";
                    // resizing image
                    \Config\Services::image()->withFile('img/inventaris/bc/pkm/' . $nama_foto_barang)
                        ->resize(800, 600, true, 'height')
                        ->save($thumbnail_path . '/' . $nama_foto_barang);

                    $data = [
                        'nomor_inventaris_pkm' => $this->request->getPost('nomor_inventaris_pkm'),
                        'nomor' => $this->request->getPost('nomor'),
                        'tahun' => $this->request->getPost('tahun'),
                        'deskripsi' => $this->request->getPost('deskripsi'),
                        'kategori' => $this->request->getPost('kategori'),
                        'jumlah_unit' => $this->request->getPost('jumlah_unit'),
                        'lokasi' => $this->request->getPost('lokasi'),
                        'lokasi_kantor' => $this->request->getPost('lokasi_kantor'),
                        'image' => $nama_foto_barang,
                        'remark' => $this->request->getPost('remark'),
                        'update_by' => user()->fullname,
                        'last_update' => date('Y-m-d H:i:s'),
                    ];
                    $this->bcpkmmodel->insert($data);
                    $stat = [
                        'status' => "TRUE",
                    ];
                    echo json_encode($stat);
                }
            }
        } else {
            exit('Maaf tidak dapat diproses');
        }
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
