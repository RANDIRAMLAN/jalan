<?php

namespace App\Database\Seeds;

class MenuSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data1 = [
            'menu'        => 'Masuk',
            'attribut'   => 'masuk',
            'role_id'     => 3,
            'icon'        => ''
        ];

        $data2 = [
            'menu'        => 'Daftar',
            'attribut'    => 'daftar',
            'role_id'     => 3,
            'icon'        => ''
        ];

        $data3 = [
            'menu'        => 'Keluar',
            'attribut'    => 'keluar',
            'role_id'     => 2,
            'icon'        => ''
        ];

        $data4 = [
            'menu'        => 'Destinasiku',
            'attribut'    => 'destinasiku',
            'role_id'     => 2,
            'icon'        => ''
        ];

        $data5 = [
            'menu'        => 'Buat Destinasi',
            'attribut'    => 'buat_destinasi',
            'role_id'     => 2,
            'icon'        => ''
        ];

        // Using Query Builder
        $this->db->table('menu')->insert($data1);
        $this->db->table('menu')->insert($data2);
        $this->db->table('menu')->insert($data3);
        $this->db->table('menu')->insert($data4);
        $this->db->table('menu')->insert($data5);
    }
}
