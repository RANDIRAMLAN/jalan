<?php

namespace App\Models;

use CodeIgniter\Model;

class DeskripsiModel extends Model
{
    protected $table      = 'deskripsi';
    protected $allowedFields = [
        'id_destinasi',
        'paragraf'
    ];
    // tambah destinasi perjalanan
    public function tambah_deskripsi($id, $paragraf)
    {
        return $this->insert([
            'id_destinasi' => $id,
            'paragraf' => $paragraf,
        ]);
    }
}
