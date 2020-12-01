<?php

namespace App\Controllers;

use App\Models\UserModel;

class Daftar extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }
    // daftar
    public function daftar()
    {
        $validation = \Config\Services::validation();
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Tidak Boleh Kosong'
                    ]
                ],
                'email' => [
                    'rules' => 'is_unique[user.email]|required',
                    'errors' => [
                        'is_unique' => 'Email Sudah Terdaftar',
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
                        'nama' => $validation->getError('nama'),
                        'email' => $validation->getError('email'),
                        'kata_sandi' => $validation->getError('kata_sandi'),
                        'konfirmasi_kata_sandi' => $validation->getError('konfirmasi_kata_sandi')
                    ]
                ];
                echo json_encode($msg);
            } else {
                $nama = $this->request->getVar('nama');
                $email = $this->request->getVar('email');
                $kata_sandi = password_hash($this->request->getVar('kata_sandi'), PASSWORD_DEFAULT);
                $this->UserModel->simpan($nama, $email, $kata_sandi);
                $msg = [
                    'pesan' => 'Data Pengguna Berhasil Disimpan. Silahkan Masuk'
                ];
                echo json_encode($msg);
            }
        } else {
            return redirect()->to('/');
        }
    }
}
