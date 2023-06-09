<?php

namespace App\Controllers;

use \App\Models\AsistenModel;
use \App\Models\LoginModel;

class AsistenController extends BaseController
{

    public function index()
    {
        $model1 = model(LoginModel::class);
        $session = session();
        if ($session->has('pengguna')) {
            $item = $session->get('pengguna');
            if ($model1->where('username', $item)) {
                $model = model(AsistenModel::class);
                $data = [
                    'list' => $model->getAsisten(),
                    'title' => 'Daftar Asisten'
                ];
                return view('asisten/AsistenView', $data);
            } else {
                return view('login/loginpage');
            }
        } else {
            return view('login/loginpage');
        }

    }

    public function simpan()
    {
        $session = session();
        if ($session->has('pengguna')) {
        helper('form');
        // Memeriksa apakah melakukan submit data atau tidak.
        if (!$this->request->is('post')) {
            return view('/asisten/simpan');
        }

        // Mengambil data yang disubmit dari form
        $post = $this->request->getPost([
            'nim',
            'nama',
            "praktikum",
            "ipk"
        ]);
        // Mengakses Model untuk menyimpan data
        $model = model(AsistenModel::class);
        $model->simpan($post);
        return view('/asisten/success');
    }else{
        return view('login/loginpage');
    }
}

    public function edit()
    {
        $db = \config\Database::connect();
        $Builder = $db->table('asisten');
        helper('form');
        if (!$this->request->is('post')) {
            return view('/asisten/update');
        }
        $data = [
            'nama' => [$this->request->getPost('nama')],
            'praktikum' => [$this->request->getPost('praktikum')],
            'ipk' => [$this->request->getPost('ipk')]
        ];
        $Builder->where('NIM', $this->request->getPost('nim'));
        $Builder->update($data);
        return view('asisten/success');
    }
    public function delete()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('asisten');
        helper('form');
        if (!$this->request->is('post')) {
            return view('/asisten/delete');
        }
        $post = $this->request->getPost([
            'nim'
        ]);
        $builder->where('nim', $post);
        $builder->delete();
        return view('/asisten/Success');
    }

    public function search()
    {
        if (!$this->request->is('post')) {
            return view('/asisten/search');
        }
        $nim = $this->request->getPost(['key']);

        $model = model(AsistenModel::class);
        $asisten = $model->ambil($nim['key']);

        $data = ['hasil' => $asisten];
        return view('asisten/search', $data);
    }


}