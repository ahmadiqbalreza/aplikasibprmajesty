<?php

namespace App\Controllers;

use App\Models\KaryawanModel;
use App\Models\DepartmentModel;
use App\Models\RoleModel;
use App\Models\UsersModel;
use App\Models\GroupsusersModel;

class User extends BaseController
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
			'title' => 'Home | APLIKASI BPRMGR'
		];
		echo view('/user/index', $data);
	}

	public function profil_saya()
	{
		$data = [
			'title' => 'Profil Saya',
			'department' => $this->departmentmodel->getAlldepartment()
		];
		echo view('/user/profil_saya', $data);
	}

	public function save_profile($id = 0)
	{
		$this->usersmodel->save([
			'id' => $id,
			'id_karyawan' => $this->request->getVar('detail_id_karyawan_kar'),
			'fullname' => $this->request->getVar('detail_fullname_kar'),
			'username' => $this->request->getVar('detail_username_kar'),
			'department' => $this->request->getVar('detail_department_kar'),
			'status_karyawan' => $this->request->getVar('detail_status_karyawan_kar'),
			'email' => $this->request->getVar('detail_email_kar'),
			'jenis_kelamin' => $this->request->getVar('detail_jenis_kelamin_kar'),
			'tgl_lahir' => $this->request->getVar('detail_tgl_lahir_kar'),
			'phone' => $this->request->getVar('detail_phone_kar')
		]);

		session()->setFlashdata('pesan_edit_profile', 'Detail Pengguna berhasil diupdate!');
		return redirect()->to("/user/profil_saya");
	}

	public function edit_profil()
	{
		$data = [
			'title' => 'Edit Profil',
			'navlink' => 'active'
		];
		echo view('/user/edit_profil', $data);
	}
}
