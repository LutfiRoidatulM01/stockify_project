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
                'user_id' => 3,
                'type' => 'Masuk',
                'quantity' => 50,
                'date' => '2024-11-03',
                'status' => 'Diterima',
                'notes' => 'Barang diterima dalam jumlah besar.',
            ],

            [
                'id' => 2,
                'product_id' => 102,
                'user_id' => 2,
                'type' => 'Masuk',
                'quantity' => 100,
                'date' => '2024-11-04',  
                'status' => 'Pending',
                'notes' => 'Barang dari supplier X',
            ],

            [
                'id' => 3,
                'product_id' => 103,
                'user_id' => 2,
                'type' => 'Masuk',
                'quantity' => 200,
                'date' => '2024-11-03', 
                'status' => 'Pending',
                'notes' => 'Barang masih dalam proses verifikasi.',
            ],
            [
                'id' => 4,
                'product_id' => 104,
                'user_id' => 3,
                'type' => 'Masuk',
                'quantity' => 60,
                'date' => '2024-11-07',  
                'status' => 'Diterima',
                'notes' => 'Barang masuk dalam jumlah besar setelah pengiriman.',
            ],

            [
                'id' => 5,
                'product_id' => 105,
                'user_id' => 2,
                'type' => 'Masuk',
                'quantity' => 100,
                'date' => '2024-11-07',  
                'status' => 'Diterima',
                'notes' => 'Barang masuk dari supplier',
            ],


        ];

        foreach($stockData as $key => $val){
            StockTransaction::create($val);
        }
    }
}
