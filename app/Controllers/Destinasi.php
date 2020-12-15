<?php

namespace App\Controllers;

use App\Models\DeskripsiModel;
use App\Models\DestinasiModel;
use App\Models\FotoDestinasiModel;

class Destinasi extends BaseController
{
    protected $DestinasiModel;
    protected $FotoDestinasiModel;
    protected $DeskripsiModel;
    public function __construct()
    {
        $this->DestinasiModel = new DestinasiModel();
        $this->FotoDestinasiModel = new FotoDestinasiModel();
        $this->DeskripsiModel = new DeskripsiModel();
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
    // ubah foto sampul
    public function foto_sampul()
    {
        $validation = \Config\Services::validation();
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'foto_sampul' => [
                    'rules' => 'uploaded[foto_sampul]|is_image[foto_sampul]|mime_in[foto_sampul,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Foto Sampul Tidak Boleh Kosong',
                        'is_image' => 'Hanya Foto Yang Dapat Diunggah',
                        'mime_in' => 'Format Gambar Harus .jeg, .jpg or .png'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'foto_sampul' => $validation->getError('foto_sampul')
                    ]
                ];
            } else {
                $id = $this->request->getVar('id_sampul');
                $foto_sampul_baru = $this->request->getFile('foto_sampul');
                $foto = $this->DestinasiModel->cariById($id);
                $foto_sampul = $foto_sampul_baru->getRandomName();
                $foto_sampul_baru->move('img/Destinasi', $foto_sampul);
                if ($foto['foto'] != 'Default.jpg') {
                    unlink('img/Destinasi/' . $foto['foto']);
                }
                $this->DestinasiModel->gantiFotoSampul($id, $foto_sampul);
                $msg = [
                    'pesan' => 'Foto Sampul Berhasil Diganti'
                ];
            }
            echo json_encode($msg);
        } else {
            return redirect()->to('/Menu/destinasiku');
        }
    }
    // foto destinasi
    public function foto_destinasi()
    {
        $validation = \Config\Services::validation();
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'foto_destinasi' => [
                    'rules' => 'uploaded[foto_destinasi]|is_image[foto_destinasi]|mime_in[foto_destinasi,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Foto Destinasi Tidak Boleh Kosong',
                        'is_image' => 'Hanya Foto Yang Dapat Diunggah',
                        'mime_in' => 'Format Gambar Harus .jeg, .jpg or .png'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'foto_destinasi' => $validation->getError('foto_destinasi')
                    ]
                ];
            } else {
                $id = $this->request->getVar('id_destinasi');
                $foto_destinasi = $this->request->getFile('foto_destinasi');
                $foto = $foto_destinasi->getRandomName();
                $foto_destinasi->move('img/Destinasi', $foto);
                $this->FotoDestinasiModel->tambah_foto_destinasi($id, $foto);
                $msg = [
                    'pesan' => 'Foto Berhasil Disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            return redirect()->to('/Menu/destinasiku');
        }
    }
    // tambah deskripsi perjalanan
    public function tambah_deskripsi()
    {
        $validation = \Config\Services::validation();
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'paragraf' => [
                    'rules' => 'required|max_length[1000]',
                    'errors' => [
                        'required' => 'Cerita Perjalanan Tidak Boleh Kosong',
                        'max_length' => 'Maksimal 1000 Karakter'
                    ]
                ]
            ])) {
                $msg = [
                    'error' => [
                        'paragraf' => $validation->getError('paragraf')
                    ]
                ];
            } else {
                $id = $this->request->getVar('id_deskripsi');
                $paragraf = $this->request->getVar('paragraf');
                $this->DeskripsiModel->tambah_deskripsi($id, $paragraf);
                $msg = [
                    'pesan' => 'Cerita Perjalanan Berhasil Disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            return redirect()->to('/Menu/destinasiku');
        }
    }
    // ubah status destinasi
    public function ubah_status_destinasi()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id_ubah');
            $data = $this->DestinasiModel->cariById($id);
            if ($data['status'] == 'Tidak Aktif') {
                $this->DestinasiModel->aktif($id);
            } else {
                $this->DestinasiModel->tidakAktif($id);
            }
            $msg = [
                'pesan' => 'Status Berhasil DiUbah'
            ];
            echo json_encode($msg);
        } else {
            return redirect()->to('/Menu/destinasiku');
        }
    }
    // tampilkan destinasi secara detail
    public function tampilkan_data_destinasi()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $foto_sampul = $this->DestinasiModel->cariById($id);
            $foto = $this->FotoDestinasiModel->cariById($id);
            $deskripsi = $this->DeskripsiModel->cariById($id);
            $data = [
                'foto' => $foto,
                'foto_sampul' => $foto_sampul,
                'deskripsi' => $deskripsi
            ];
            echo json_encode($data);
        } else {
            return redirect()->to('/Menu/destinasiku');
        }
    }
    // hapus cerita dan foto destinasi
    public function cerita_dan_foto()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $foto = $this->FotoDestinasiModel->cariById($id);
            $deskripsi = $this->DeskripsiModel->cariById($id);
            $data = [
                'foto' => $foto,
                'deskripsi' => $deskripsi
            ];
            echo json_encode($data);
        } else {
            return redirect()->to('/Menu/destinasiku');
        }
    }
    // hapus paragraf
    public function hapus_paragraf()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $paragraf = $this->request->getVar('paragraf');
            $this->DeskripsiModel->hapus($id, $paragraf);
            $deskripsi = $this->DeskripsiModel->cariById($id);
            $data = [
                'deskripsi' => $deskripsi
            ];
            echo json_encode($data);
        } else {
            return redirect()->to('/Menu/destinasiku');
        }
    }
    // hapus foto
    public function hapus_foto()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $hapus_foto = $this->request->getVar('foto');
            $this->FotoDestinasiModel->hapus($id, $hapus_foto);
            unlink('img/Destinasi/' . $hapus_foto);
            $foto = $this->FotoDestinasiModel->cariById($id);
            $data = [
                'foto' => $foto
            ];
            echo json_encode($data);
        } else {
            return redirect()->to('/Menu/destinasiku');
        }
    }
}
