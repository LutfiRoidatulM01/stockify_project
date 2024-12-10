<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryData = [
            [
                'id' => 1,
                'name' => 'Elektronik',
                'description' => 'Kategori untuk produk elektronik seperti TV, radio, dan komputer.',
            ],

            [
                'id' => 2,
                'name' => 'Pakaian',
                'description' => 'Kategori untuk berbagai jenis pakaian, termasuk pakaian pria, wanita, dan anak-anak.',
            ],

            [
                'id' => 3,
                'name' => 'Makanan',
                'description' => 'Kategori untuk berbagai jenis makanan dan minuman.',
            ],

            [
                'id' => 4,
                'name' => 'Perabotan Rumah Tangga',
                'description' => 'Kategori untuk peralatan rumah tangga seperti kursi, meja, dan lemari.'
            ],

            [
                'id' => 5,
                'name' => 'Olahraga',
                'description' => 'Kategori untuk berbagai jenis peralatan olahraga dan pakaian olahraga.'
            ],

            [
                'id' => 6,
                'name' => 'Kecantikan',
                'description' => 'Kategori untuk produk-produk kecantikan dan perawatan tubuh.'
            ],

            [
                'id' => 7,
                'name' => 'Mainan Anak',
                'description' => 'Kategori untuk berbagai jenis mainan anak-anak.'
            ],

            [
                'id' => 8,
                'name' => 'Buku',
                'description' => 'Kategori untuk buku-buku, baik fiksi maupun non-fiksi.'
            ],

            [
                'id' => 9,
                'name' => 'Aksesoris',
                'description' => 'Kategori untuk aksesoris seperti jam tangan, tas, dan perhiasan.'
            ],

            [
                'id' => 10,
                'name' => 'Automotif',
                'description' => 'Kategori untuk kendaraan dan aksesori otomotif.'
            ],

            [
                'id' => 11,
                'name' => 'Peralatan Kantor',
                'description' => 'Kategori untuk peralatan kantor dan perlengkapan kerja.'
            ],

            [
                'id' => 12,
                'name' => 'Furnitur',
                'description' => 'Kategori untuk berbagai jenis furnitur rumah dan kantor.'
            ],

            [
                'id' => 13,
                'name' => 'Peralatan Dapur',
                'description' => 'Kategori untuk peralatan dapur dan masak.'
            ],

            [
                'id' => 14,
                'name' => 'Ponsel & Aksesori',
                'description' => 'Kategori untuk ponsel dan aksesori terkait.'
            ],

            [
                'id' => 15,
                'name' => 'Bahan Bangunan',
                'description' => 'Kategori untuk bahan bangunan dan peralatan konstruksi.'
            ],

            [
                'id' => 16,
                'name' => 'Alat Musik',
                'description' => 'Kategori untuk berbagai jenis alat musik.'
            ],

            [
                'id' => 17,
                'name' => 'Hobi',
                'description' => 'Kategori untuk barang-barang hobi seperti peralatan melukis dan peralatan berkebun.'
            ],

            [
                'id' => 18,
                'name' => 'Produk Kesehatan',
                'description' => 'Kategori untuk produk-produk kesehatan dan perawatan tubuh.'
            ],

            [
                'id' => 19,
                'name' => 'Listrik & Elektronik Rumah Tangga',
                'description' => 'Kategori untuk produk-produk listrik dan elektronik rumah tangga.'
            ],

            [
                'id' => 20,
                'name' => 'Produk Bayi & Anak-anak',
                'description' => 'Kategori untuk produk-produk bayi dan anak-anak.'
            ]
        ];

        foreach ($categoryData as $key => $val) {
            Category::create($val);
        }
    }
}
