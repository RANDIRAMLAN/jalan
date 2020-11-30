<?php

namespace App\Database\Seeds;

class MenuSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data1 = [
            'menu'        => 'Masuk',
            'attribut'    => 'masuk',
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
            'menu'        => '',
            'attribut'    => '',
            'role_id'     => 2,
            'icon'        => 'fas fa-user-circle'
        ];
        // Using Query Builder
        $this->db->table('menu')->insert($data1);
        $this->db->table('menu')->insert($data2);
        $this->db->table('menu')->insert($data3);
    }
}
