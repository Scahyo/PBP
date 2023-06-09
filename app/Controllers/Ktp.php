<?php

namespace App\Controllers;

class Ktp extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'KTP'
        ];
        return view('ktp/profil', $data);
    }
}