<?php

namespace App\Database\Seeds;

class RoleSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data1 = [
            'role'    => 'Admin'
        ];

        $data2 = [
            'role' => 'Pengguna'
        ];

        $data3 = [
            'role' => 'Tamu'
        ];

        // Using Query Builder
        $this->db->table('role')->insert($data1);
        $this->db->table('role')->insert($data2);
        $this->db->table('role')->insert($data3);
    }
}
