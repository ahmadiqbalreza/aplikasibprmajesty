<?php

namespace App\Models;

use Myth\Auth\Models\UserModel as MythModel;

class UserModel extends MythModel
{
    protected $allowedFields = [
        'email', 'id_karyawan', 'username', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at', 'fullname', 'department', 'jenis_kelamin', 'tgl_lahir', 'status_karyawan', 'phone', 'access_nomor_surat', 'access_inventaris', 'access_cuti_online',
    ];
}
