<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'APLIKASI BPRMGR'
        ];
        echo view('/login/login_page', $data);
    }
}
