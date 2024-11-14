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
                'name' => 'Lutfi',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'admin',
            ],
            [
                'id' => 2,
                'name' => 'Aisyifa',
                'email' => 'manajer@gmail.com',
                'password' => bcrypt('123456'), 
                'role' => 'manajer_gudang', 
            ],
            [
                'id' => 3,
                'name' => 'Iqbal',
                'email' => 'staff@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'staff_gudang',
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
