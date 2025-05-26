<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductCategory extends Seeder
{
    public function run()
    {
        // Membuat data kategori produk
        $data = [
            [
                'nama' => 'Laptop',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Smartphone',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'Headphone',
                'created_at' => date("Y-m-d H:i:s"),
            ]
        ];

        foreach ($data as $item) {
            // Insert data kategori ke tabel
            $this->db->table('product_category')->insert($item);
        }
    }
}
