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
                'name' => 'Makanan dan Minuman',
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
                'name' => 'Mainan',
                'description' => 'Kategori untuk berbagai jenis mainan anak-anak.'
            ],

            [
                'id' => 8,
                'name' => 'Buku',
                'description' => 'Kategori untuk buku-buku, baik fiksi maupun non-fiksi.'
            ],

            [
                'id' => 9,
                'name' => 'Interior',
                'description' => 'Kategori untuk barang dekoratif'
            ],

            [
                'id' => 10,
                'name' => 'Kesehatan',
                'description' => 'Kategori untuk barang kesehatan'
            ],


        ];

        foreach ($categoryData as $key => $val) {
            Category::create($val);
        }
    }
}
