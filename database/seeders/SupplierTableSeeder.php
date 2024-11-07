<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supplierData = [
            [
                'id' => 1,
                'name' => 'PT. Teknologi Nusantara',
                'address' => 'Jl. Jendral Sudirman No. 45, Jakarta',
                'phone' => '081234567890',
                'email' => 'teknologi.nusantara@example.com'
            ],

            [
                'id' => 2,
                'name' => 'CV. Busana Trendy',
                'address' => 'Jl. Merdeka No. 21, Bandung',
                'phone' => '082134567891',
                'email' => 'busana.trendy@example.com'
            ],

            [
                'id' => 3,
                'name' => 'UD. Rasa Makmur',
                'address' => 'Jl. Pahlawan No. 10, Surabaya',
                'phone' => '083134567892',
                'email' => 'rasa.makmur@example.com'
            ],

            [
                'id' => 4,
                'name' => 'CV. Mode Stylish',
                'address' => 'Jl. Imam Bonjol No. 17, Yogyakarta',
                'phone' => '085134567894',
                'email' => 'mode.stylish@example.com'
            ],

        ];

        foreach($supplierData as $key => $val){
            Supplier::create($val);
        }
    }
}
