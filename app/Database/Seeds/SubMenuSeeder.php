<?php

namespace App\Database\Seeds;

class SubMenuSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data1 = [
            'menu_id' => '3',
            'sub_menu'    => 'Destinasiku',
            'icon' => '',
            'attribut' => '',
            'url' => '/Menu/destinasiku'
        ];

        $data2 = [
            'menu_id' => '3',
            'sub_menu'    => 'Buat Destinasi',
            'icon' => '',
            'attribut' => 'buat_destinasi',
            'url' => ''
        ];

        $data3 = [
            'menu_id' => '3',
            'sub_menu'    => 'Keluar',
            'icon' => '',
            'attribut' => '',
            'url' => ''
        ];

        // Using Query Builder
        $this->db->table('sub_menu')->insert($data1);
        $this->db->table('sub_menu')->insert($data2);
        $this->db->table('sub_menu')->insert($data3);
    }
}
