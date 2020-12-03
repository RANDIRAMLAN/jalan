<?php

namespace App\Controllers;

use App\Models\UserModel;

class Lupa extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    // lupa kata sandi
    public function lupa()
    {
        $validation = \Config\Services::validation();
        if ($this->request->isAJAX()) {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('kata_sandi');
            $kata_sandi = password_hash($password, PASSWORD_DEFAULT);
            $periksa_email = $this->UserModel->getByEmail($email);
            if (!$this->validate([
                'email' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Email Tidak Boleh Kosong'
                    ]
                ],
                'kata_sandi' => [
                    'rules' => 'required|min_length[5]|matches[konfirmasi_kata_sandi]',
                    'errors' => [
                        'required' => 'Kata Sandi Tidak Boleh Kosong',
                        'min_length' => 'Kata Sandi Minimal 5 Karakter',
                        'matches' => 'Kata Sandi Harus Sama Dengan Konfirmasi Kata Sandi'
                    ]
                ],
                'konfirmasi_kata_sandi' => [
                    'rules' => 'required|min_length[5]|matches[kata_sandi]',
                    'errors' => [
                        'required' => 'Kata Sandi Tidak Boleh Kosong',
                        'min_length' => 'Kata Sandi Minimal 5 Karakter',
                        'matches' => 'Konfirmasi Kata Sandi Harus Sama Dengan Kata Sandi'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'email' => $validation->getError('email'),
                        'kata_sandi' => $validation->getError('kata_sandi'),
                        'konfirmasi_kata_sandi' => $validation->getError('konfirmasi_kata_sandi')
                    ]
                ];
            } else {
                if ($periksa_email) {
                    $this->UserModel->lupa($email, $kata_sandi);
                    $msg = [
                        'pesan' => 'Kata Sandi Berhasil Diganti. Silahkan Masuk Menggunakan Kata Sandi Yang Baru'
                    ];
                } else {
                    $msg = [
                        'error' => [
                            'email' => 'Email Tidak Terdaftar'
                        ]
                    ];
                }
            }
            echo json_encode($msg);
        } else {
            return redirect()->to('/');
        }
    }
}
