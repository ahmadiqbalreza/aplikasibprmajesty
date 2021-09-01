<?php

namespace App\Controllers;

use App\Models\KaryawanModel;

class Admin extends BaseController
{
    protected $db, $table_users, $table_karyawan;
    protected $karyawanmodel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->table_users = $this->db->table('users');
        $this->karyawanmodel = new KaryawanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin'
        ];
        echo view('/admin/index', $data);
    }

    public function akun_pengguna()
    {
        // $users = new \Myth\Auth\Models\UserModel();
        // 'users' => $users->findAll()

        $this->table_users->select('users.id as userid, username, email, name');
        $this->table_users->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->table_users->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->table_users->get();
        $data = [
            'title' => 'Akun Pengguna',
            'users' => $query->getResult()
        ];
        echo view('/admin/akun_pengguna', $data);
    }

    public function detail($id = 0)
    {
        $this->table_users->select('users.id as userid, username, fullname, user_image, department, email, name');
        $this->table_users->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->table_users->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->table_users->where('users.id', $id);
        $query = $this->table_users->get();

        $data = [
            'title' => 'Akun Pengguna',
            'user' => $query->getRow()
        ];

        if (empty($data['user'])) {
            return redirect()->to('/admin');
        }

        echo view('/admin/detail', $data);
    }

    public function add_akun()
    {
        $data = [
            'title' => 'Add Akun'
        ];
        echo view('/admin/add_akun', $data);
    }

    public function tambah_karyawan()
    {
        $data = [
            'title' => 'Tambah Karyawan',
            'validation' => \Config\Services::validation()
        ];
        echo view('/admin/tambah_karyawan', $data);
    }

    public function insert_table_karyawan()
    {
        // ===== Validasi ======= 
        if (!$this->validate([
            'id_karyawan' => [
                'rules' => 'required|is_unique[users.id_karyawan]|is_unique[table_karyawan.id_karyawan]',
                'errors' => [
                    'required' => 'ID Karyawan harus diisi!',
                    'is_unique' => 'ID Karyawan sudah ada!'
                ]
            ],
            'fullname' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => 'Nama harus diisi!',
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[users.username]|is_unique[table_karyawan.username]',
                'errors' => [
                    'required' => 'Username harus diisi!',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi!',
                ]
            ],
            'pass_confirm' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi Password harus diisi!',
                    'matches' => 'Konfirmasi Password tidak sama!'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[users.email]|is_unique[table_karyawan.email]',
                'errors' => [
                    'required' => 'Email harus diisi!',
                ]
            ],
            'department' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => 'Department harus diisi!',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => 'Jenis Kelamin harus diisi!',
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => 'Tanggal Lahir harus diisi!',
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => 'Tempat Lahir harus diisi!',
                ]
            ],
            'phone' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => 'Nomor HP harus diisi!',
                ]
            ],
            'alamat' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => 'Alamat harus diisi!',
                ]
            ],
            'status_karyawan' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => 'Status Karyawan harus diisi!',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $this->karyawanmodel->save([
            'id_karyawan' => $this->request->getVar('id_karyawan'),
            'fullname' => $this->request->getVar('fullname'),
            'username' => $this->request->getVar('username'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat' => $this->request->getVar('alamat'),
            'phone' => $this->request->getVar('phone'),
            'email' => $this->request->getVar('email'),
            'department' => $this->request->getVar('department')
        ]);
    }
}
