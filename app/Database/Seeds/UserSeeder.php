<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'administrador',
            'password' => password_hash('98765432', PASSWORD_DEFAULT),
        ];

        $this->db->table('users')->insert($data);
    }
}
