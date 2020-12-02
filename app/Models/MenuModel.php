<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table      = 'menu';
    // tampilkan menu  sebelum masuk

    public function menuAwal()
    {
        return $this->where(['role_id' => 3])->findAll();
    }
    // tampilkan menu setelah masuk 
    public function menuAkhir()
    {
        return $this->where(['role_id' => 2])->orderby('id', 'DESC')->findAll();
    }
}
