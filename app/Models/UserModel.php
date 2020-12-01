<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $allowedFields = [
        'nama',
        'email',
        'password',
        'role_id'
    ];
    protected $useTimestamps = true;

    // simpan data
    public function simpan($nama, $email, $kata_sandi)
    {
        return $this->insert([
            'nama' => $nama,
            'email' => $email,
            'password' => $kata_sandi,
            'role_id' => 2
        ]);
    }
    // cari data berdasarkan email
    public function getByEmail($email)
    {
        return $this->where(['email' => $email])->first();
    }
    // ganti kata sandi
    public function lupa($email, $kata_sandi)
    {
        return $this
            ->set(['password' => $kata_sandi])
            ->where(['email' => $email])
            ->update();
    }
}
