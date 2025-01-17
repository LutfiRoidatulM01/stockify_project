<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settingData = [
            [
                'app_name' => 'Stockify',
                'app_logo' => null,
            ]
        ];

        foreach($settingData as $key => $val){
            Setting::create($val);
        }
    }
}
