<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'auth_groups';
    protected $useTimestamps = false;
    protected $allowedFields = ['id', 'name', 'description'];

    public function getAllrole()
    {
        return $this->findAll();
    }
}
