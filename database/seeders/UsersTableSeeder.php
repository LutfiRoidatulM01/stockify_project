<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'id' => 1,
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'admin',
            ],
            [
                'id' => 2,
                'name' => 'Warehouse Manager',
                'email' => 'manager@gmail.com',
                'password' => bcrypt('123456'), // Ganti dengan password yang diinginkan
                'role' => 'manajer_gudang', 
            ],
            [
                'id' => 3,
                'name' => 'Warehouse Staff',
                'email' => 'staff@gmail.com',
                'password' => bcrypt('123456'), // Ganti dengan password yang diinginkan
                'role' => 'staff_gudang',
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
