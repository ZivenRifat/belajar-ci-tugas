<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiskonSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        $startDate = strtotime('2025-07-01');

        for ($i = 0; $i < 10; $i++) {
            $tanggal = date('Y-m-d', strtotime("+$i day", $startDate));
            $data = [
                'tanggal'    => $tanggal,
                'nominal'    => $faker->numberBetween(50000, 200000),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->table('diskon')->insert($data);
        }
    }
}
