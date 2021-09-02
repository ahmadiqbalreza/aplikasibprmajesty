<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupsusersModel extends Model
{
    protected $table = 'auth_groups_users';
    protected $useTimestamps = false;
    protected $allowedFields = ['group_id', 'user_id'];

    public function getAllgroupusers()
    {
        return $this->findAll();
    }
}
