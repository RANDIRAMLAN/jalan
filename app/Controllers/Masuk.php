<?php

namespace App\Controllers;

use App\Models\UserModel;

class Masuk extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function masuk()
    {
        $validation = \Config\Services::validation();
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'email' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Email Tidak Boleh Kosong'
                    ]
                ],
                'kata_sandi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kata Sandi Tidak Boleh Kosong'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'email' => $validation->getError('email'),
                        'kata_sandi' => $validation->getError('kata_sandi')
                    ]
                ];
            } else {
                $email = $this->request->getVar('email');
                $kata_sandi = $this->request->getVar('kata_sandi');
                $user = $this->UserModel->getByEmail($email);
                if ($user) {
                    if (password_verify($kata_sandi, $user['password'])) {
                        $data = [
                            'email' => $user['email'],
                            'nama' => $user['nama']
                        ];
                        session()->set($data);
                        $msg = [
                            'pesan' => 'Selamat Datang'
                        ];
                    } else {
                        $msg = [
                            'error' => [
                                'kata_sandi' => 'Kata Sandi Yang Dimasukkan Salah'
                            ]
                        ];
                    }
                } else {
                    $msg = [
                        'error' => [
                            'email' => 'Email Yang Dimasukkan Belum Terdaftar'
                        ]
                    ];
                }
            }
            echo json_encode($msg);
        } else {
            return redirect()->to('/');
        }
    }
    // keluar
    public function keluar()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
