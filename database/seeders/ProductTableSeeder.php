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
                'category_id' => 1, 
                'supplier_id' => 1, 
                'sku' => 'TV42-123',
                'purchase_price' => 3000000,
                'selling_price' => 3500000,
                'minimum_stock' => 100,
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
                'minimum_stock' => 200,
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
                'minimum_stock' => 300,
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
                'minimum_stock' => 200,
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
                'minimum_stock' => 200,
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
                'minimum_stock' => 200,
                'description' => 'Bola sepak standar internasional.'
            ],

            [
                'id' => 107,
                'name' => 'Tas Ransel Laptop',
                'category_id' => 9,
                'supplier_id' => 7,
                'sku' => 'TAS-LAPTOP123',
                'purchase_price' => 200000,
                'selling_price' => 250000,
                'minimum_stock' => 200,
                'description' => 'Tas ransel untuk laptop dengan banyak kompartemen.'
            ],


            [
                'id' => 108,
                'name' => 'Sepatu Olahraga',
                'category_id' => 5,
                'supplier_id' => 8,
                'sku' => 'SEPATU-OLAH-01',
                'purchase_price' => 250000,
                'selling_price' => 300000,
                'minimum_stock' => 200,
                'description' => 'Sepatu olahraga untuk lari dan gym.'
            ],

            [
                'id' => 109,
                'name' => 'Meja Kantor',
                'category_id' => 13,
                'supplier_id' => 9,
                'sku' => 'MEJA-KANTOR01',
                'purchase_price' => 500000,
                'selling_price' => 700000,
                'minimum_stock' => 200,
                'description' => 'Meja kantor dengan desain minimalis.'
            ],

            [
                'id' => 110,
                'name' => 'Lampu Tidur LED',
                'category_id' => 4,
                'supplier_id' => 10,
                'sku' => 'LAMPU-LED123',
                'purchase_price' => 50000,
                'selling_price' => 75000,
                'minimum_stock' => 200,
                'description' => 'Lampu tidur dengan lampu LED yang hemat energi.'
            ],

            [
                'id' => 111,
                'name' => 'Ponsel Android 5G',
                'category_id' => 14,
                'supplier_id' => 11,
                'sku' => 'PONSEL-5G123',
                'purchase_price' => 3000000,
                'selling_price' => 3500000,
                'minimum_stock' => 200,
                'description' => 'Ponsel Android dengan koneksi 5G dan kamera 48MP.'
            ],

            [
                'id' => 112,
                'name' => 'Buku Novel',
                'category_id' => 8,
                'supplier_id' => 12,
                'sku' => 'BUKU-NOVEL01',
                'purchase_price' => 75000,
                'selling_price' => 100000,
                'minimum_stock' => 200,
                'description' => 'Buku novel fiksi dengan cerita misteri.'
            ],

            [
                'id' => 113,
                'name' => 'Alat Musik Gitar',
                'category_id' => 16,
                'supplier_id' => 13,
                'sku' => 'GITAR-001',
                'purchase_price' => 700000,
                'selling_price' => 900000,
                'minimum_stock' => 200,
                'description' => 'Gitar akustik dengan suara yang jernih.'
            ],

            [
                'id' => 114,
                'name' => 'Smartwatch Fitness',
                'category_id' => 1,
                'supplier_id' => 14,
                'sku' => 'SMARTWATCH-123',
                'purchase_price' => 500000,
                'selling_price' => 650000,
                'minimum_stock' => 200,
                'description' => 'Smartwatch dengan fitur pelacak kebugaran.'
            ],

            [
                'id' => 115,
                'name' => 'Kursi Gaming',
                'category_id' => 4,
                'supplier_id' => 15,
                'sku' => 'KURSI-GAMING01',
                'purchase_price' => 750000,
                'selling_price' => 900000,
                'minimum_stock' => 200,
                'description' => 'Kursi gaming dengan desain ergonomis.'
            ],

            [
                'id' => 116,
                'name' => 'Peralatan Berkebun',
                'category_id' => 17,
                'supplier_id' => 16,
                'sku' => 'KEBUN-001',
                'purchase_price' => 100000,
                'selling_price' => 120000,
                'minimum_stock' => 200,
                'description' => 'Peralatan berkebun lengkap dengan sekop dan cangkul.'
            ],

            [
                'id' => 117,
                'name' => 'Blender Multifungsi',
                'category_id' => 13,
                'supplier_id' => 17,
                'sku' => 'BLENDER-001',
                'purchase_price' => 250000,
                'selling_price' => 300000,
                'minimum_stock' => 200,
                'description' => 'Blender multifungsi dengan kecepatan tinggi.'
            ],

            [
                'id' => 118,
                'name' => 'Perlengkapan Hiking',
                'category_id' => 5,
                'supplier_id' => 18,
                'sku' => 'HIKING-001',
                'purchase_price' => 150000,
                'selling_price' => 200000,
                'minimum_stock' => 200,
                'description' => 'Perlengkapan hiking untuk perjalanan outdoor.'
            ],

            [
                'id' => 119,
                'name' => 'Set Peralatan Dapur',
                'category_id' => 13,
                'supplier_id' => 19,
                'sku' => 'DAPUR-001',
                'purchase_price' => 400000,
                'selling_price' => 500000,
                'minimum_stock' => 200,
                'description' => 'Set peralatan dapur lengkap dengan pisau dan sendok.'
            ],

            [
                'id' => 120,
                'name' => 'Bola Basket',
                'category_id' => 5,
                'supplier_id' => 20,
                'sku' => 'BOLA-002',
                'purchase_price' => 150000,
                'selling_price' => 180000,
                'minimum_stock' => 200,
                'description' => 'Bola basket standar NBA.'
            ],

            [
                'id' => 121,
                'name' => 'Baju Renang Wanita',
                'category_id' => 2,
                'supplier_id' => 1,
                'sku' => 'RENANG-WOMAN-001',
                'purchase_price' => 250000,
                'selling_price' => 300000,
                'minimum_stock' => 200,
                'description' => 'Baju renang modis untuk wanita.'
            ],

        ];

        foreach ($productData as $key => $val) {
            Product::create($val);
        }
    }
}
