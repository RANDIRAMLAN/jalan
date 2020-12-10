<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoDestinasiModel extends Model
{
    protected $table      = 'foto_destinasi';
    protected $allowedFields = [
        'id_destinasi',
        'foto'
    ];
    // tambah foto destinasi
    public function tambah_foto_destinasi($id, $foto)
    {
        return $this->insert([
            'id_destinasi' => $id,
            'foto' => $foto,
        ]);
    }
}
