<?php

namespace App\Controllers;

class Cuti_online extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        echo view('/cuti_online/index', $data);
    }
}
