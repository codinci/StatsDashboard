<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
       $data = [
            [
                'email' => 'testUser@example.com',
                'password' => password_hash('#Test1234', PASSWORD_BCRYPT),
                'county_id' => 2
            ],
            [
                'email' => 'adminUser@example.com',
                'password' => password_hash('#Admin1234', PASSWORD_BCRYPT),
                'county_id' => 1
            ],
            // Add more data as needed
        ];


        $this->db->table('users')->insertBatch($data);
    }
}
