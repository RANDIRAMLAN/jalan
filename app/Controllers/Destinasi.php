<?php

namespace App\Controllers;

use App\Models\DestinasiModel;

class Destinasi extends BaseController
{
    protected $DestinasiModel;
    public function __construct()
    {
        $this->DestinasiModel = new DestinasiModel();
    }
    // buat destinasi
    public function tambah_destinasi()
    {
        $validation =  \Config\Services::validation();
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'judul_destinasi' => [
                    'rules' => 'required|max_length[50]',
                    'errors' => [
                        'required' => 'Judul Destinasi Tidak Boleh Kosong',
                        'max_length' => 'Judul Destinasi Maksimal 50 Karakter'
                    ]
                ],
                'deskripsi_singkat' => [
                    'rules' => 'required|max_length[100]',
                    'errors' => [
                        'required' => 'Deskripsi Tidak Boleh Kosong',
                        'max_length' => 'Deskripsi Maksimal 100 Karakter'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'judul_destinasi' => $validation->getError('judul_destinasi'),
                        'deskripsi_singkat' => $validation->getError('deskripsi_singkat')
                    ]
                ];
            } else {
                $email = session()->get('email');
                $judul_destinasi = $this->request->getVar('judul_destinasi');
                $deskripsi_singkat = $this->request->getVar('deskripsi_singkat');
                $foto = 'Default.jpg';
                $status = 'Tidak Aktif';
                $penulis = $email;
                $this->DestinasiModel->tambah_destinasi($judul_destinasi, $deskripsi_singkat, $foto, $status, $penulis);
                $msg = [
                    'pesan' => 'Destinasi Berhasil Ditambah'
                ];
            }
            echo json_encode($msg);
        } else {
            return redirect()->to('/Menu/destinasiku');
        }
    }
    // menampilkan list  destinasiku
    public function destinasiku()
    {
        if ($this->request->isAJAX()) {
            $cari = $this->request->getVar('cari');
            $email = session()->get('email');
            if ($cari) {
                $destinasiku = $this->DestinasiModel->cari($cari, $email);
            } else {
                $destinasiku = $this->DestinasiModel->tampilkan($email);
            }
            echo json_encode($destinasiku);
        } else {
            return redirect()->to('/Menu/destinasiku');
        }
    }
}
