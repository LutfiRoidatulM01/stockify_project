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
                'email' => 'teknologi.nusantara@gmail.com'
            ],

            [
                'id' => 2,
                'name' => 'CV. Busana Trendy',
                'address' => 'Jl. Merdeka No. 21, Bandung',
                'phone' => '082134567891',
                'email' => 'busana.trendy@gmail.com'
            ],

            [
                'id' => 3,
                'name' => 'UD. Rasa Makmur',
                'address' => 'Jl. Pahlawan No. 10, Surabaya',
                'phone' => '083134567892',
                'email' => 'rasa.makmur@gmail.com'
            ],

            [
                'id' => 4,
                'name' => 'CV. Mode Stylish',
                'address' => 'Jl. Imam Bonjol No. 17, Yogyakarta',
                'phone' => '085134567894',
                'email' => 'mode.stylish@gmail.com'
            ],

            [
                'id' => 5,
                'name' => 'PT. Indah Sejahtera',
                'address' => 'Jl. Raya No. 25, Malang',
                'phone' => '081567890123',
                'email' => 'indah.sejahtera@gmail.com'
            ],

            [
                'id' => 6,
                'name' => 'CV. Karya Sukses',
                'address' => 'Jl. Pahlawan No. 30, Semarang',
                'phone' => '082678901234',
                'email' => 'karya.sukses@gmail.com'
            ],

            [
                'id' => 7,
                'name' => 'PT. Sumber Makmur',
                'address' => 'Jl. Merdeka No. 33, Bali',
                'phone' => '083789012345',
                'email' => 'sumber.makmur@gmail.com'
            ],

            [
                'id' => 8,
                'name' => 'UD. Citra Jaya',
                'address' => 'Jl. Raya No. 45, Solo',
                'phone' => '084890123456',
                'email' => 'citra.jaya@@gmail.com'
            ],

            [
                'id' => 9,
                'name' => 'CV. Global Utama',
                'address' => 'Jl. Sudirman No. 50, Medan',
                'phone' => '085901234567',
                'email' => 'global.utama@gmail.com'
            ],

            [
                'id' => 10,
                'name' => 'PT. Sinergi Internasional',
                'address' => 'Jl. Bunga No. 12, Surabaya',
                'phone' => '087012345678',
                'email' => 'sinergi.internasional@gmail.com'
            ],


            [
                'id' => 11,
                'name' => 'CV. Sukses Bersama',
                'address' => 'Jl. Pahlawan No. 19, Jakarta',
                'phone' => '089012345678',
                'email' => 'sukses.bersama@gmail.com'
            ],

            [
                'id' => 12,
                'name' => 'PT. Energi Alam',
                'address' => 'Jl. Raya Alam No. 15, Bali',
                'phone' => '089112233445',
                'email' => 'energi.alam@gmail.com'
            ],

            [
                'id' => 13,
                'name' => 'UD. Maju Terus',
                'address' => 'Jl. Raya No. 25, Surabaya',
                'phone' => '089223344556',
                'email' => 'maju.terus@gmail.com'
            ],

            [
                'id' => 14,
                'name' => 'PT. Karya Makmur',
                'address' => 'Jl. Gunung No. 55, Bandung',
                'phone' => '089334455667',
                'email' => 'karya.makmur@gmail.com'
            ],

            [
                'id' => 15,
                'name' => 'CV. Sejahtera Mandiri',
                'address' => 'Jl. Timur No. 12, Medan',
                'phone' => '089445566778',
                'email' => 'sejahtera.mandiri@gmail.com'
            ],

            [
                'id' => 16,
                'name' => 'PT. Global Indonesia',
                'address' => 'Jl. Raya Barat No. 30, Jakarta',
                'phone' => '089556677889',
                'email' => 'global.indonesia@gmail.com'
            ],

            [
                'id' => 17,
                'name' => 'CV. Permata Dunia',
                'address' => 'Jl. Sejahtera No. 8, Yogyakarta',
                'phone' => '089667788990',
                'email' => 'permata.dunia@gmail.com'
            ],

            [
                'id' => 18,
                'name' => 'PT. Sinergi Teknologi',
                'address' => 'Jl. Teknologi No. 5, Surabaya',
                'phone' => '089778899001',
                'email' => 'sinergi.teknologi@gmail.com'
            ],

            [
                'id' => 19,
                'name' => 'CV. Karya Sempurna',
                'address' => 'Jl. Raya Timur No. 18, Bali',
                'phone' => '089889900112',
                'email' => 'karya.sempurna@gmail.com'
            ],

            [
                'id' => 20,
                'name' => 'PT. Maju Sejahtera',
                'address' => 'Jl. Sudirman No. 28, Semarang',
                'phone' => '089900011223',
                'email' => 'maju.sejahtera@gmail.com'
            ]

        ];

        foreach ($supplierData as $key => $val) {
            Supplier::create($val);
        }
    }
}
