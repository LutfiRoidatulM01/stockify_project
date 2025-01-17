<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productData = [
            [
                'id' => 101,
                'name' => 'Smart TV',
                'category_id' => 1, 
                'supplier_id' => 1, 
                'sku' => 'TV42-123',
                'purchase_price' => 3000000,
                'selling_price' => 3500000,
                'minimum_stock' => 70,
                'description' => 'TV pintar dengan resolusi HD dan konektivitas internet.',
            ],
            [
                'id' => 102,
                'name' => 'Kemeja Formal Pria',
                'category_id' => 2,
                'supplier_id' => 2, 
                'sku' => 'KF123-456',
                'purchase_price' => 100000,
                'selling_price' => 150000,
                'minimum_stock' => 150,
                'description' => 'Kemeja formal berkualitas tinggi untuk keperluan kantor.',
            ],
            [
                'id' => 103,
                'name' => 'Biskuit Coklat',
                'category_id' => 3, 
                'supplier_id' => 3, 
                'sku' => 'BC789-101',
                'purchase_price' => 15000,
                'selling_price' => 20000,
                'minimum_stock' => 150,
                'description' => 'Biskuit rasa coklat dengan isian krim lezat.',
            ],
            [
                'id' => 104,
                'name' => 'Laptop Gaming',
                'category_id' => 1, 
                'supplier_id' => 1, 
                'sku' => 'LPG2023-789',
                'purchase_price' => 10000000,
                'selling_price' => 12000000,
                'minimum_stock' => 80,
                'description' => 'Laptop high-end untuk gaming dengan prosesor terbaru.',
            ],
            [
                'id' => 105,
                'name' => 'Dress Wanita',
                'category_id' => 2,
                'supplier_id' => 4, 
                'sku' => 'DW111-333',
                'purchase_price' => 250000,
                'selling_price' => 300000,
                'minimum_stock' => 80,
                'description' => 'Dress elegan dengan bahan berkualitas untuk acara formal.',
            ],

            [
                'id' => 106,
                'name' => 'Bola Sepak',
                'category_id' => 5,
                'supplier_id' => 6,
                'sku' => 'BOLA-456',
                'purchase_price' => 75000,
                'selling_price' => 100000,
                'minimum_stock' => 120,
                'description' => 'Bola sepak standar internasional.'
            ],

            [
                'id' => 107,
                'name' => 'Buku Matematika',
                'category_id' => 8,
                'supplier_id' => 7,
                'sku' => 'BK-MTK12',
                'purchase_price' => 200000,
                'selling_price' => 250000,
                'minimum_stock' => 100,
                'description' => 'Buku belajar matematika'
            ],


            [
                'id' => 108,
                'name' => 'Sepatu Olahraga',
                'category_id' => 5,
                'supplier_id' => 8,
                'sku' => 'SEPATU-OLAH-01',
                'purchase_price' => 250000,
                'selling_price' => 300000,
                'minimum_stock' => 120,
                'description' => 'Sepatu olahraga untuk lari dan gym.'
            ],

        ];

        foreach ($productData as $key => $val) {
            Product::create($val);
        }
    }
}
