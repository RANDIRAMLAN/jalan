<?php

namespace App\Models;

use CodeIgniter\Model;

class DestinasiModel extends Model
{
    protected $table      = 'destinasi';
    protected $allowedFields = [
        'judul_destinasi',
        'deskripsi_singkat',
        'status',
        'penulis'
    ];
    protected $useTimestamps = true;
    // tambah destinasi
    public function tambah_destinasi($judul_destinasi, $deskripsi_singkat, $status, $penulis)
    {
        return $this->insert([
            'judul_destinasi' => $judul_destinasi,
            'deskripsi_singkat' => $deskripsi_singkat,
            'status' => $status,
            'penulis' => $penulis
        ]);
    }
}
