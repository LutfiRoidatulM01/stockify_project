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
                'name' => 'Smart TV 42 inch',
                'category_id' => 1, // Elektronik
                'supplier_id' => 1, // PT. Teknologi Nusantara
                'sku' => 'TV42-123',
                'purchase_price' => 3000000,
                'selling_price' => 3500000,
                'description' => 'TV pintar dengan resolusi HD dan konektivitas internet.',
            ],
            [
                'id' => 102,
                'name' => 'Kemeja Formal Pria',
                'category_id' => 2, // Pakaian
                'supplier_id' => 2, // CV. Busana Trendy
                'sku' => 'KF123-456',
                'purchase_price' => 100000,
                'selling_price' => 150000,
                'description' => 'Kemeja formal berkualitas tinggi untuk keperluan kantor.',
            ],
            [
                'id'=> 103,
                'name' => 'Biskuit Coklat',
                'category_id' => 3, // Makanan
                'supplier_id' => 3, // UD. Rasa Makmur
                'sku' => 'BC789-101',
                'purchase_price' => 15000,
                'selling_price' => 20000,
                'description' => 'Biskuit rasa coklat dengan isian krim lezat.',
            ],
            [
                'id'=> 104,
                'name' => 'Laptop Gaming',
                'category_id' => 1, // Elektronik
                'supplier_id' => 1, // PT. Teknologi Nusantara
                'sku' => 'LPG2023-789',
                'purchase_price' => 10000000,
                'selling_price' => 12000000,
                'description' => 'Laptop high-end untuk gaming dengan prosesor terbaru.',
            ],
            [
                'id' => 105,
                'name' => 'Dress Wanita',
                'category_id' => 2, // Pakaian
                'supplier_id' => 4, // CV. Mode Stylish
                'sku' => 'DW111-333',
                'purchase_price' => 250000,
                'selling_price' => 300000,
                'description' => 'Dress elegan dengan bahan berkualitas untuk acara formal.',
            ],
        ];

        foreach($productData as $key => $val){
            Product::create($val);
        }
    }
}
