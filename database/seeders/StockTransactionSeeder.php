<?php

namespace Database\Seeders;

use App\Models\StockTransaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stockData = [
            [
                'id' => 1,
                'product_id' => 101,
                'user_id' => 1,
                'type' => 'Masuk',
                'quantity' => 100,
                'date' => '2024-11-03',
                'status' => 'Diterima',
                'notes' => 'Barang diterima dalam jumlah besar.',
            ],

            [
                'id' => 2,
                'product_id' => 102,
                'user_id' => 2,
                'type' => 'Keluar',
                'quantity' => 50,
                'date' => '2024-11-04',  // Menetapkan tanggal saat ini
                'status' => 'Dikeluarkan',
                'notes' => 'Pengiriman barang ke pelanggan X.',
            ],

            [
                'id' => 3,
                'product_id' => 103,
                'user_id' => 3,
                'type' => 'Masuk',
                'quantity' => 200,
                'date' => '2024-11-03',  // Tanggal manual
                'status' => 'Pending',
                'notes' => 'Barang masih dalam proses verifikasi.',
            ],

            [
                'id' => 4,
                'product_id' => 104,
                'user_id' => 1,
                'type' => 'Keluar',
                'quantity' => 75,
                'date' => '2024-11-05',  // Tanggal tertentu
                'status' => 'Ditolak',
                'notes' => 'Barang ditolak karena rusak.',
            ],
            [
                'id' => 5,
                'product_id' => 105,
                'user_id' => 2,
                'type' => 'Masuk',
                'quantity' => 150,
                'date' => '2024-11-07',  // Tanggal tertentu
                'status' => 'Diterima',
                'notes' => 'Barang masuk dalam jumlah besar setelah pengiriman.',
            ],

        ];

        foreach($stockData as $key => $val){
            StockTransaction::create($val);
        }
    }
}
