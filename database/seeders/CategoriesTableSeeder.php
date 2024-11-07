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
        ];

        foreach($categoryData as $key => $val){
            Category::create($val);
        }
    }
}
