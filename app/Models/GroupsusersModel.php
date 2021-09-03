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

    public function getupdategroupsusers($id, $group_id)
    {
        $dbgroupid = $this->findColumn('user_id', $id);
        if ($dbgroupid == $group_id) {
            return $this->set('group_id', $group_id)->where('user_id', $id)->update();
        } else {
            return $this->set('group_id', $group_id)->where('user_id', $id)->update();
        }
    }
}
