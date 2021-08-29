<?php

namespace App\Controllers;

class Inventaris extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Inventaris | APLIKASI BPRMGR'
        ];
        echo view('/inventaris/index', $data);
    }
}
