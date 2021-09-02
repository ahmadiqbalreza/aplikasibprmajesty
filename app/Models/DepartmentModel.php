<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $table = 'table_department';
    protected $useTimestamps = false;
    protected $allowedFields = ['id', 'department'];

    public function getAlldepartment()
    {
        return $this->findAll();
    }
}
