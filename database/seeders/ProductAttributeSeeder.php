<?php

namespace Database\Seeders;

use App\Models\ProductAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributeData = [
            // Atribut untuk Smart TV 42 inch
            [
                'id' => 1,
                'product_id' => 101,
                'name' => 'Resolusi',
                'value' => 'HD',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'product_id' => 101,
                'name' => 'Konektivitas',
                'value' => 'Wi-Fi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'product_id' => 101,
                'name' => 'Ukuran',
                'value' => '42 inch',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Atribut untuk Kemeja Formal Pria
            [
                'id' => 4,
                'product_id' => 102,
                'name' => 'Ukuran',
                'value' => 'L',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'product_id' => 102,
                'name' => 'Bahan',
                'value' => 'Katun',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'product_id' => 102,
                'name' => 'Warna',
                'value' => 'Putih',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Atribut untuk Biskuit Coklat
            [
                'id' => 7,
                'product_id' => 103,
                'name' => 'Berat',
                'value' => '150 gram',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'product_id' => 103,
                'name' => 'Rasa',
                'value' => 'Coklat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'product_id' => 103,
                'name' => 'Kemasan',
                'value' => 'Plastik',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Atribut untuk Laptop Gaming
            [
                'id' => 10,
                'product_id' => 104,
                'name' => 'Prosesor',
                'value' => 'Intel i9',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'product_id' => 104,
                'name' => 'RAM',
                'value' => '16GB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'product_id' => 104,
                'name' => 'Penyimpanan',
                'value' => '1TB SSD',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Atribut untuk Dress Wanita
            [
                'id' => 13,
                'product_id' => 105,
                'name' => 'Ukuran',
                'value' => 'M',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'product_id' => 105,
                'name' => 'Bahan',
                'value' => 'Sutra',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'product_id' => 105,
                'name' => 'Warna',
                'value' => 'Merah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach($attributeData as $key => $val){
            ProductAttribute::create($val);
        }
    }
}
