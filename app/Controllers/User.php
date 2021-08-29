<?php

namespace App\Controllers;

class User extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home | APLIKASI BPRMGR'
		];
		echo view('/user/index', $data);
	}

	public function pengaturan()
	{
		$data = [
			'title' => 'Pengaturan'
		];
		echo view('/user/pengaturan', $data);
	}

	public function edit_profil()
	{
		$data = [
			'title' => 'Edit Profil'
		];
		echo view('/user/edit_profil', $data);
	}
}
