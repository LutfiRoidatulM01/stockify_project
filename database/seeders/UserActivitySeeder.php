<?php

namespace Database\Seeders;

use App\Models\UserActivity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activityData = [
            [
                'id' => 1,
                'user_id' => 1,
                'log' => 'Admin menambahkan user baru',
                'created_at' => now(),
            ],

            [
                'id' => 2,
                'user_id' => 2,
                'log' => 'Manajer menambahkan transaksi masuk',
                'created_at' => now(),
            ],

            [
                'id' => 3,
                'user_id' => 3,
                'log' => 'Staff menambahkan transaksi masuk',
                'created_at' => now(),
            ],
        ];

        foreach($activityData as $key => $val){
            UserActivity::create($val);
        }
    }
}
