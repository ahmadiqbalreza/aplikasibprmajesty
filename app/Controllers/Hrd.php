<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use App\Models\DepartmentModel;
use App\Models\RoleModel;
use App\Models\UsersModel;
use App\Models\GroupsusersModel;

class Hrd extends BaseController
{
    protected $db, $table_users, $table_karyawan;
    protected $karyawanmodel;
    protected $departmentmodel;
    protected $rolemodel;
    protected $usersmodel;
    protected $groupsusersmodel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->table_users = $this->db->table('users');
        $this->karyawanmodel = new KaryawanModel();
        $this->departmentmodel = new DepartmentModel();
        $this->rolemodel = new RoleModel();
        $this->usersmodel = new UsersModel();
        $this->groupsusersmodel = new GroupsusersModel();
    }

    public function index()
    {
        $data = [
            'title' => 'HRD'
        ];
        echo view('/hrd/index', $data);
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
        echo view('/hrd/akun_pengguna', $data);
    }

    public function detail($id = 0)
    {
        $this->table_users->select('users.id as userid, username, fullname, user_image, department, email, name, phone, jenis_kelamin, tgl_lahir, status_karyawan, created_at, id_karyawan, group_id');
        $this->table_users->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->table_users->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->table_users->where('users.id', $id);
        $query = $this->table_users->get();

        $data = [
            'title' => 'Akun Pengguna',
            'user' => $query->getRow(),
            'department' => $this->departmentmodel->getAlldepartment(),
            'role' => $this->rolemodel->getAllrole()
        ];

        if (empty($data['user'])) {
            return redirect()->to('/hrd');
        }

        echo view('/hrd/detail', $data);
    }

    public function save_profile($id = 0)
    {
        $this->usersmodel->save([
            'id' => $id,
            'id_karyawan' => $this->request->getVar('detail_id_karyawan'),
            'fullname' => $this->request->getVar('detail_fullname'),
            'username' => $this->request->getVar('detail_username'),
            'department' => $this->request->getVar('detail_department'),
            'status_karyawan' => $this->request->getVar('detail_status_karyawan'),
            'email' => $this->request->getVar('detail_email'),
            'jenis_kelamin' => $this->request->getVar('detail_jenis_kelamin'),
            'tgl_lahir' => $this->request->getVar('detail_tgl_lahir'),
            'phone' => $this->request->getVar('detail_phone')
        ]);

        $group = $this->request->getVar('detail_role');
        $this->groupsusersmodel->getupdategroupsusers($id, $group);

        session()->setFlashdata('pesan_edit_profile', 'Detail Pengguna berhasil diupdate! <br> Jika terdapat perubahan pada role harap tunggu 10 menit kemudian silahkan login ulang kembali!');
        return redirect()->to("/hrd/detail/$id");
    }

    public function akses_pengguna()
    {
        // $users = new \Myth\Auth\Models\UserModel();
        // 'users' => $users->findAll()
        $this->table_users->select('users.id as userid, username, email, name, access_nomor_surat, access_inventaris, access_cuti_online');
        $this->table_users->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->table_users->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->table_users->get();
        $data = [
            'title' => 'Akses Pengguna',
            'users' => $query->getResult()
        ];
        echo view('/hrd/akses_pengguna', $data);
    }

    public function ajax_edit($id)
    {
        $data = $this->usersmodel->getbyId($id);
        echo json_encode($data);
    }

    public function akses_update()
    {
        $this->usersmodel->save([
            'id' => $this->request->getPost('id_kar'),
            'username' => $this->request->getPost('username'),
            'access_nomor_surat' => $this->request->getPost('sel_access_nomor_surat'),
            'access_inventaris' => $this->request->getPost('sel_access_inventaris'),
            'access_cuti_online' => $this->request->getPost('sel_access_cuti_online'),
        ]);
        echo json_encode(array("status" => TRUE));
    }

    public function add_karyawan_nosur()
    {
        $data = [
            'title' => 'Tambah Karyawan',
            'validation' => \Config\Services::validation()
        ];
        echo view('/hrd/tambah_karyawan', $data);
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
