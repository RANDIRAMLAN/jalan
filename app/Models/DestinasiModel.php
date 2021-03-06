<?php

namespace App\Models;

use CodeIgniter\Model;

class DestinasiModel extends Model
{
    protected $table      = 'destinasi';
    protected $allowedFields = [
        'judul_destinasi',
        'deskripsi_singkat',
        'foto',
        'status',
        'penulis'
    ];
    protected $useTimestamps = true;
    // tambah destinasi
    public function tambah_destinasi($judul_destinasi, $deskripsi_singkat, $foto, $status, $penulis)
    {
        return $this->insert([
            'judul_destinasi' => $judul_destinasi,
            'deskripsi_singkat' => $deskripsi_singkat,
            'foto' => $foto,
            'status' => $status,
            'penulis' => $penulis
        ]);
    }
    // cari destinasiku berdasarkan data pengguna
    public function cari($cari, $email)
    {
        return $this
            ->where(['penulis' => $email])
            ->like(['judul_destinasi' => $cari])
            ->orLike(['deskripsi_singkat' => $cari])
            ->findAll();
    }
    // cari data destinasi
    public function mencari($cari)
    {
        return $this
            ->like(['judul_destinasi' => $cari])
            ->orLike((['deskripsi_singkat' => $cari]))
            ->findAll();
    }
    // menampilkan destinasi berdasarkan data pengguna
    public function tampilkan($email)
    {
        return $this->where(['penulis' => $email])->orderby('created_at', 'DESC')->findAll();
    }
    //menampilkan data destinasi
    public function menampilkan()
    {
        return $this->where(['status' => 'Aktif'])->orderby('created_at', 'DESC')->get(500)->getResultArray();
    }
    // cari destinasi by Id
    public function cariById($id)
    {
        return $this->where(['id' => $id])->first();
    }
    // ganti foto_sampul
    public function gantiFotoSampul($id, $foto_sampul)
    {
        return $this
            ->set(['foto' => $foto_sampul])
            ->where(['id' => $id])
            ->update();
    }
    // ubah status menjadi aktif
    public function aktif($id)
    {
        return $this
            ->set(['status' => 'Aktif'])
            ->where(['id' => $id])
            ->update();
    }
    // ubah status menjadi tidak  aktif
    public function tidakAktif($id)
    {
        return $this
            ->set(['status' => 'Tidak Aktif'])
            ->where(['id' => $id])
            ->update();
    }
}
