<?php

namespace App\Controllers;

use App\Models\model_inventaris\BCpkmModel;
use App\Models\model_inventaris\BCprkModel;
use App\Models\model_inventaris\BCfnoModel;
use App\Models\model_inventaris\BCfnbModel;
use phpDocumentor\Reflection\PseudoTypes\True_;

class Inventaris extends BaseController
{
    protected $bcpkmmodel;
    protected $bcprkmodel;
    protected $bcfnomodel;
    protected $bcfnbmodel;
    public function __construct()
    {
        $this->bcpkmmodel = new BCpkmModel();
        $this->bcprkmodel = new BCprkModel();
        $this->bcfnomodel = new BCfnoModel();
        $this->bcfnbmodel = new BCfnbModel();
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

    // =================================================================
    // Batas Awal Controller Inventaris PKM Batam Center
    // =================================================================
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

    public function ajax_get_nomor_terakhir()
    {
        $data = $this->bcpkmmodel->getNomorterakhir();
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
                        ->text(date('dmy H:i:s'), [
                            'color'      => '#000000',
                            'opacity'    => 0,
                            'hAlign'     => 'center',
                            'vAlign'     => 'bottom',
                            'fontSize'   => 35
                        ])
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
                        'keterangan_lain' => $this->request->getPost('keterangan_lain'),
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
        // Inisialisasi Variabel
        $file_foto_barang = $this->request->getFile('inp_foto_barang');
        $nomor_inventaris_pkm = $this->request->getPost('nomor_inventaris_pkm');
        $imgname = $this->bcpkmmodel->getImagename($nomor_inventaris_pkm);

        // Penghapusan File Foto Jika ada upload foto baru
        if ($file_foto_barang != null) {
            //delete gambar
            foreach ($imgname as $imgname1) {
                $file_name = $imgname1['image'];
                if (file_exists('img/inventaris/bc/pkm/' . $file_name)) {
                    unlink('img/inventaris/bc/pkm/' . $file_name);
                }
            }

            // Upload Gambar Baru
            $nmr_inv = $nomor_inventaris_pkm;
            $ext = $file_foto_barang->getClientExtension();
            $nama_foto_barang = "$nmr_inv.$ext";
            $nama_foto = $nama_foto_barang;
            $file_foto_barang->move('img/inventaris/bc/pkm/', $nama_foto_barang);
            $thumbnail_path = "img/inventaris/bc/pkm";
            // resizing image
            \Config\Services::image()->withFile('img/inventaris/bc/pkm/' . $nama_foto_barang)
                ->resize(800, 600, true, 'height')
                ->text(date('dmy H:i:s'), [
                    'color'      => '#000000',
                    'opacity'    => 0,
                    'hAlign'     => 'center',
                    'vAlign'     => 'bottom',
                    'fontSize'   => 35
                ])
                ->save($thumbnail_path . '/' . $nama_foto_barang);
        } else {
            // Hanya Update nama file gambar 
            foreach ($imgname as $imgname1) {
                $nama_foto = $imgname1['image'];
            }
        }

        $data = [
            'nomor_inventaris_pkm' => $nomor_inventaris_pkm,
            'nomor' => $this->request->getPost('nomor'),
            'tahun' => $this->request->getPost('tahun'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'kategori' => $this->request->getPost('kategori'),
            'jumlah_unit' => $this->request->getPost('jumlah_unit'),
            'lokasi' => $this->request->getPost('lokasi'),
            'lokasi_kantor' => $this->request->getPost('lokasi_kantor'),
            'image' => $nama_foto,
            'remark' => $this->request->getPost('remark'),
            'keterangan_lain' => $this->request->getPost('keterangan_lain'),
            'update_by' => user()->fullname,
            'last_update' => date('Y-m-d H:i:s'),
        ];
        $this->bcpkmmodel->where('nomor_inventaris_pkm', $nomor_inventaris_pkm)->set($data)->update();
        echo json_encode(array("status" => TRUE));
    }

    public function bcpkm_delete($nomor_inventaris_pkm)
    {
        // Proses Menghapus File Image
        $imgname = $this->bcpkmmodel->getImagename($nomor_inventaris_pkm);
        foreach ($imgname as $imgname1) {
            $file_name = $imgname1['image'];
            if (file_exists('img/inventaris/bc/pkm/' . $file_name)) {
                // Proses Delete gambar
                unlink('img/inventaris/bc/pkm/' . $file_name);
                // Proses delete data 
                $this->bcpkmmodel->where('nomor_inventaris_pkm', $nomor_inventaris_pkm)->delete();
                echo json_encode(array("status" => TRUE));
            } else {
                // Proses delete data 
                $this->bcpkmmodel->where('nomor_inventaris_pkm', $nomor_inventaris_pkm)->delete();
                echo json_encode(array("status" => TRUE));
            }
        }
    }
    // =================================================================
    // Batas Akhir Controller Inventaris PKM Batam Center
    // =================================================================


    // =================================================================
    // Batas Awal Controller Inventaris PRK Batam Center
    // =================================================================
    public function bc_prk()
    {
        $data = [
            'title' => 'PRK',
            'db_bcprk' => $this->bcprkmodel->getAllbcprk(),
            'validation' => \Config\Services::validation()
        ];
        echo view('/inventaris/inv_bc/bc_prk', $data);
    }

    public function ajax_get_bcprk($nomor_inventaris_prk)
    {
        $data = $this->bcprkmodel->getbyNomorinventarisbcprk($nomor_inventaris_prk);
        echo json_encode($data);
    }

    public function ajax_get_nomor_terakhir_prk()
    {
        $data = $this->bcprkmodel->getNomorterakhir();
        echo json_encode($data);
    }

    public function bcprk_add()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate(
                [
                    'nomor_inventaris_prk' => [
                        'rules' => 'required|is_unique[inventaris_bc_prk.nomor_inventaris_prk]',
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
                        'nomor_inventaris_prk' => $validation->getError('nomor_inventaris_prk'),
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
                $nmr_inv = $this->request->getPost('nomor_inventaris_prk');
                $ext = $file_foto_barang->getClientExtension();
                $nama_foto_barang = "$nmr_inv.$ext";
                if ($file_foto_barang->move('img/inventaris/bc/prk/', $nama_foto_barang)) {
                    $thumbnail_path = "img/inventaris/bc/prk";
                    // resizing image
                    \Config\Services::image()->withFile('img/inventaris/bc/prk/' . $nama_foto_barang)
                        ->resize(800, 600, true, 'height')
                        ->text(date('dmy H:i:s'), [
                            'color'      => '#000000',
                            'opacity'    => 0,
                            'hAlign'     => 'center',
                            'vAlign'     => 'bottom',
                            'fontSize'   => 35
                        ])
                        ->save($thumbnail_path . '/' . $nama_foto_barang);

                    $data = [
                        'nomor_inventaris_prk' => $this->request->getPost('nomor_inventaris_prk'),
                        'nomor' => $this->request->getPost('nomor'),
                        'tahun' => $this->request->getPost('tahun'),
                        'deskripsi' => $this->request->getPost('deskripsi'),
                        'kategori' => $this->request->getPost('kategori'),
                        'jumlah_unit' => $this->request->getPost('jumlah_unit'),
                        'lokasi' => $this->request->getPost('lokasi'),
                        'lokasi_kantor' => $this->request->getPost('lokasi_kantor'),
                        'image' => $nama_foto_barang,
                        'remark' => $this->request->getPost('remark'),
                        'keterangan_lain' => $this->request->getPost('keterangan_lain'),
                        'update_by' => user()->fullname,
                        'last_update' => date('Y-m-d H:i:s'),
                    ];
                    $this->bcprkmodel->insert($data);
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

    public function bcprk_update()
    {
        // Inisialisasi Variabel
        $file_foto_barang = $this->request->getFile('inp_foto_barang');
        $nomor_inventaris_prk = $this->request->getPost('nomor_inventaris_prk');
        $imgname = $this->bcprkmodel->getImagename($nomor_inventaris_prk);

        // Penghapusan File Foto Jika ada upload foto baru
        if ($file_foto_barang != null) {
            //delete gambar
            foreach ($imgname as $imgname1) {
                $file_name = $imgname1['image'];
                if (file_exists('img/inventaris/bc/prk/' . $file_name)) {
                    unlink('img/inventaris/bc/prk/' . $file_name);
                }
            }

            // Upload Gambar Baru
            $nmr_inv = $nomor_inventaris_prk;
            $ext = $file_foto_barang->getClientExtension();
            $nama_foto_barang = "$nmr_inv.$ext";
            $nama_foto = $nama_foto_barang;
            $file_foto_barang->move('img/inventaris/bc/prk/', $nama_foto_barang);
            $thumbnail_path = "img/inventaris/bc/prk";
            // resizing image
            \Config\Services::image()->withFile('img/inventaris/bc/prk/' . $nama_foto_barang)
                ->resize(800, 600, true, 'height')
                ->text(date('dmy H:i:s'), [
                    'color'      => '#000000',
                    'opacity'    => 0,
                    'hAlign'     => 'center',
                    'vAlign'     => 'bottom',
                    'fontSize'   => 35
                ])
                ->save($thumbnail_path . '/' . $nama_foto_barang);
        } else {
            // Hanya Update nama file gambar 
            foreach ($imgname as $imgname1) {
                $nama_foto = $imgname1['image'];
            }
        }

        $data = [
            'nomor_inventaris_prk' => $nomor_inventaris_prk,
            'nomor' => $this->request->getPost('nomor'),
            'tahun' => $this->request->getPost('tahun'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'kategori' => $this->request->getPost('kategori'),
            'jumlah_unit' => $this->request->getPost('jumlah_unit'),
            'lokasi' => $this->request->getPost('lokasi'),
            'lokasi_kantor' => $this->request->getPost('lokasi_kantor'),
            'image' => $nama_foto,
            'remark' => $this->request->getPost('remark'),
            'keterangan_lain' => $this->request->getPost('keterangan_lain'),
            'update_by' => user()->fullname,
            'last_update' => date('Y-m-d H:i:s'),
        ];
        $this->bcprkmodel->where('nomor_inventaris_prk', $nomor_inventaris_prk)->set($data)->update();
        echo json_encode(array("status" => TRUE));
    }

    public function bcprk_delete($nomor_inventaris_prk)
    {
        // Proses Menghapus File Image
        $imgname = $this->bcprkmodel->getImagename($nomor_inventaris_prk);
        foreach ($imgname as $imgname1) {
            $file_name = $imgname1['image'];
            if (file_exists('img/inventaris/bc/prk/' . $file_name)) {
                // Proses Delete gambar
                unlink('img/inventaris/bc/prk/' . $file_name);
                // Proses delete data 
                $this->bcprkmodel->where('nomor_inventaris_prk', $nomor_inventaris_prk)->delete();
                echo json_encode(array("status" => TRUE));
            } else {
                // Proses delete data 
                $this->bcprkmodel->where('nomor_inventaris_prk', $nomor_inventaris_prk)->delete();
                echo json_encode(array("status" => TRUE));
            }
        }
    }
    // =================================================================
    // Batas Akhir Controller Inventaris PRK Batam Center
    // =================================================================


    // =================================================================
    // Batas Awal Controller Inventaris Furniture Non Besi Batam Center
    // =================================================================
    public function bc_fno()
    {
        $data = [
            'title' => 'FNO',
            'db_bcfno' => $this->bcfnomodel->getAllbcfno(),
            'validation' => \Config\Services::validation()
        ];
        echo view('/inventaris/inv_bc/bc_fno', $data);
    }

    public function ajax_get_bcfno($nomor_inventaris_fno)
    {
        $data = $this->bcfnomodel->getbyNomorinventarisbcfno($nomor_inventaris_fno);
        echo json_encode($data);
    }

    public function ajax_get_nomor_terakhir_fno()
    {
        $data = $this->bcfnomodel->getNomorterakhir();
        echo json_encode($data);
    }

    public function bcfno_add()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate(
                [
                    'nomor_inventaris_fno' => [
                        'rules' => 'required|is_unique[inventaris_bc_fno.nomor_inventaris_fno]',
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
                        'nomor_inventaris_fno' => $validation->getError('nomor_inventaris_fno'),
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
                $nmr_inv = $this->request->getPost('nomor_inventaris_fno');
                $ext = $file_foto_barang->getClientExtension();
                $nama_foto_barang = "$nmr_inv.$ext";
                if ($file_foto_barang->move('img/inventaris/bc/fno/', $nama_foto_barang)) {
                    $thumbnail_path = "img/inventaris/bc/fno";
                    // resizing image
                    \Config\Services::image()->withFile('img/inventaris/bc/fno/' . $nama_foto_barang)
                        ->resize(800, 600, true, 'height')
                        ->text(date('dmy H:i:s'), [
                            'color'      => '#000000',
                            'opacity'    => 0,
                            'hAlign'     => 'center',
                            'vAlign'     => 'bottom',
                            'fontSize'   => 35
                        ])
                        ->save($thumbnail_path . '/' . $nama_foto_barang);

                    $data = [
                        'nomor_inventaris_fno' => $this->request->getPost('nomor_inventaris_fno'),
                        'nomor' => $this->request->getPost('nomor'),
                        'tahun' => $this->request->getPost('tahun'),
                        'deskripsi' => $this->request->getPost('deskripsi'),
                        'kategori' => $this->request->getPost('kategori'),
                        'jumlah_unit' => $this->request->getPost('jumlah_unit'),
                        'lokasi' => $this->request->getPost('lokasi'),
                        'lokasi_kantor' => $this->request->getPost('lokasi_kantor'),
                        'image' => $nama_foto_barang,
                        'remark' => $this->request->getPost('remark'),
                        'keterangan_lain' => $this->request->getPost('keterangan_lain'),
                        'update_by' => user()->fullname,
                        'last_update' => date('Y-m-d H:i:s'),
                    ];
                    $this->bcfnomodel->insert($data);
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

    public function bcfno_update()
    {
        // Inisialisasi Variabel
        $file_foto_barang = $this->request->getFile('inp_foto_barang');
        $nomor_inventaris_fno = $this->request->getPost('nomor_inventaris_fno');
        $imgname = $this->bcfnomodel->getImagename($nomor_inventaris_fno);

        // Penghapusan File Foto Jika ada upload foto baru
        if ($file_foto_barang != null) {
            //delete gambar
            foreach ($imgname as $imgname1) {
                $file_name = $imgname1['image'];
                if (file_exists('img/inventaris/bc/fno/' . $file_name)) {
                    unlink('img/inventaris/bc/fno/' . $file_name);
                }
            }

            // Upload Gambar Baru
            $nmr_inv = $nomor_inventaris_fno;
            $ext = $file_foto_barang->getClientExtension();
            $nama_foto_barang = "$nmr_inv.$ext";
            $nama_foto = $nama_foto_barang;
            $file_foto_barang->move('img/inventaris/bc/fno/', $nama_foto_barang);
            $thumbnail_path = "img/inventaris/bc/fno";
            // resizing image
            \Config\Services::image()->withFile('img/inventaris/bc/fno/' . $nama_foto_barang)
                ->resize(800, 600, true, 'height')
                ->text(date('dmy H:i:s'), [
                    'color'      => '#000000',
                    'opacity'    => 0,
                    'hAlign'     => 'center',
                    'vAlign'     => 'bottom',
                    'fontSize'   => 35
                ])
                ->save($thumbnail_path . '/' . $nama_foto_barang);
        } else {
            // Hanya Update nama file gambar 
            foreach ($imgname as $imgname1) {
                $nama_foto = $imgname1['image'];
            }
        }

        $data = [
            'nomor_inventaris_fno' => $nomor_inventaris_fno,
            'nomor' => $this->request->getPost('nomor'),
            'tahun' => $this->request->getPost('tahun'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'kategori' => $this->request->getPost('kategori'),
            'jumlah_unit' => $this->request->getPost('jumlah_unit'),
            'lokasi' => $this->request->getPost('lokasi'),
            'lokasi_kantor' => $this->request->getPost('lokasi_kantor'),
            'image' => $nama_foto,
            'remark' => $this->request->getPost('remark'),
            'keterangan_lain' => $this->request->getPost('keterangan_lain'),
            'update_by' => user()->fullname,
            'last_update' => date('Y-m-d H:i:s'),
        ];
        $this->bcfnomodel->where('nomor_inventaris_fno', $nomor_inventaris_fno)->set($data)->update();
        echo json_encode(array("status" => TRUE));
    }

    public function bcfno_delete($nomor_inventaris_fno)
    {
        // Proses Menghapus File Image
        $imgname = $this->bcfnomodel->getImagename($nomor_inventaris_fno);
        foreach ($imgname as $imgname1) {
            $file_name = $imgname1['image'];
            if (file_exists('img/inventaris/bc/fno/' . $file_name)) {
                // Proses Delete gambar
                unlink('img/inventaris/bc/fno/' . $file_name);
                // Proses delete data 
                $this->bcfnomodel->where('nomor_inventaris_fno', $nomor_inventaris_fno)->delete();
                echo json_encode(array("status" => TRUE));
            } else {
                // Proses delete data 
                $this->bcfnomodel->where('nomor_inventaris_fno', $nomor_inventaris_fno)->delete();
                echo json_encode(array("status" => TRUE));
            }
        }
    }
    // =================================================================
    // Batas Akhir Controller Inventaris Furniture Non Besi Batam Center
    // =================================================================

    // ==============================================================
    // Batas Awal Controller Inventaris Furniture Besi Batam Center
    // ==============================================================
    public function bc_fnb()
    {
        $data = [
            'title' => 'FNB',
            'db_bcfnb' => $this->bcfnbmodel->getAllbcfnb(),
            'validation' => \Config\Services::validation()
        ];
        echo view('/inventaris/inv_bc/bc_fnb', $data);
    }

    public function ajax_get_bcfnb($nomor_inventaris_fnb)
    {
        $data = $this->bcfnbmodel->getbyNomorinventarisbcfnb($nomor_inventaris_fnb);
        echo json_encode($data);
    }

    public function ajax_get_nomor_terakhir_fnb()
    {
        $data = $this->bcfnbmodel->getNomorterakhir();
        echo json_encode($data);
    }

    public function bcfnb_add()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate(
                [
                    'nomor_inventaris_fnb' => [
                        'rules' => 'required|is_unique[inventaris_bc_fnb.nomor_inventaris_fnb]',
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
                        'nomor_inventaris_fnb' => $validation->getError('nomor_inventaris_fnb'),
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
                $nmr_inv = $this->request->getPost('nomor_inventaris_fnb');
                $ext = $file_foto_barang->getClientExtension();
                $nama_foto_barang = "$nmr_inv.$ext";
                if ($file_foto_barang->move('img/inventaris/bc/fnb/', $nama_foto_barang)) {
                    $thumbnail_path = "img/inventaris/bc/fnb";
                    // resizing image
                    \Config\Services::image()->withFile('img/inventaris/bc/fnb/' . $nama_foto_barang)
                        ->resize(800, 600, true, 'height')
                        ->text(date('dmy H:i:s'), [
                            'color'      => '#000000',
                            'opacity'    => 0,
                            'hAlign'     => 'center',
                            'vAlign'     => 'bottom',
                            'fontSize'   => 35
                        ])
                        ->save($thumbnail_path . '/' . $nama_foto_barang);

                    $data = [
                        'nomor_inventaris_fnb' => $this->request->getPost('nomor_inventaris_fnb'),
                        'nomor' => $this->request->getPost('nomor'),
                        'tahun' => $this->request->getPost('tahun'),
                        'deskripsi' => $this->request->getPost('deskripsi'),
                        'kategori' => $this->request->getPost('kategori'),
                        'jumlah_unit' => $this->request->getPost('jumlah_unit'),
                        'lokasi' => $this->request->getPost('lokasi'),
                        'lokasi_kantor' => $this->request->getPost('lokasi_kantor'),
                        'image' => $nama_foto_barang,
                        'remark' => $this->request->getPost('remark'),
                        'keterangan_lain' => $this->request->getPost('keterangan_lain'),
                        'update_by' => user()->fullname,
                        'last_update' => date('Y-m-d H:i:s'),
                    ];
                    $this->bcfnbmodel->insert($data);
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

    public function bcfnb_update()
    {
        // Inisialisasi Variabel
        $file_foto_barang = $this->request->getFile('inp_foto_barang');
        $nomor_inventaris_fnb = $this->request->getPost('nomor_inventaris_fnb');
        $imgname = $this->bcfnbmodel->getImagename($nomor_inventaris_fnb);

        // Penghapusan File Foto Jika ada upload foto baru
        if ($file_foto_barang != null) {
            //delete gambar
            foreach ($imgname as $imgname1) {
                $file_name = $imgname1['image'];
                if (file_exists('img/inventaris/bc/fnb/' . $file_name)) {
                    unlink('img/inventaris/bc/fnb/' . $file_name);
                }
            }

            // Upload Gambar Baru
            $nmr_inv = $nomor_inventaris_fnb;
            $ext = $file_foto_barang->getClientExtension();
            $nama_foto_barang = "$nmr_inv.$ext";
            $nama_foto = $nama_foto_barang;
            $file_foto_barang->move('img/inventaris/bc/fnb/', $nama_foto_barang);
            $thumbnail_path = "img/inventaris/bc/fnb";
            // resizing image
            \Config\Services::image()->withFile('img/inventaris/bc/fnb/' . $nama_foto_barang)
                ->resize(800, 600, true, 'height')
                ->text(date('dmy H:i:s'), [
                    'color'      => '#000000',
                    'opacity'    => 0,
                    'hAlign'     => 'center',
                    'vAlign'     => 'bottom',
                    'fontSize'   => 35
                ])
                ->save($thumbnail_path . '/' . $nama_foto_barang);
        } else {
            // Hanya Update nama file gambar 
            foreach ($imgname as $imgname1) {
                $nama_foto = $imgname1['image'];
            }
        }

        $data = [
            'nomor_inventaris_fnb' => $nomor_inventaris_fnb,
            'nomor' => $this->request->getPost('nomor'),
            'tahun' => $this->request->getPost('tahun'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'kategori' => $this->request->getPost('kategori'),
            'jumlah_unit' => $this->request->getPost('jumlah_unit'),
            'lokasi' => $this->request->getPost('lokasi'),
            'lokasi_kantor' => $this->request->getPost('lokasi_kantor'),
            'image' => $nama_foto,
            'remark' => $this->request->getPost('remark'),
            'keterangan_lain' => $this->request->getPost('keterangan_lain'),
            'update_by' => user()->fullname,
            'last_update' => date('Y-m-d H:i:s'),
        ];
        $this->bcfnbmodel->where('nomor_inventaris_fnb', $nomor_inventaris_fnb)->set($data)->update();
        echo json_encode(array("status" => TRUE));
    }

    public function bcfnb_delete($nomor_inventaris_fnb)
    {
        // Proses Menghapus File Image
        $imgname = $this->bcfnbmodel->getImagename($nomor_inventaris_fnb);
        foreach ($imgname as $imgname1) {
            $file_name = $imgname1['image'];
            if (file_exists('img/inventaris/bc/fnb/' . $file_name)) {
                // Proses Delete gambar
                unlink('img/inventaris/bc/fnb/' . $file_name);
                // Proses delete data 
                $this->bcfnbmodel->where('nomor_inventaris_fnb', $nomor_inventaris_fnb)->delete();
                echo json_encode(array("status" => TRUE));
            } else {
                // Proses delete data 
                $this->bcfnbmodel->where('nomor_inventaris_fnb', $nomor_inventaris_fnb)->delete();
                echo json_encode(array("status" => TRUE));
            }
        }
    }
    // ==============================================================
    // Batas Akhir Controller Inventaris Furniture Besi Batam Center
    // ==============================================================

}
