<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CountiesSeeder extends Seeder
{
    public function run()
    {
         $data = [
            [
                'county_name' => 'Uasin Gishu',
            ],
            [
                'county_name' => 'Elgeyo Marakwet',
            ],

        ];


        $this->db->table('counties')->insertBatch($data);
    }
}
