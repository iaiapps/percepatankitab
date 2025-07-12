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
        Setting::create([
            'name' => 'no_hp',
            'value' => '081298440068',
            'description' => 'No Hp untuk digunakan mengirim WA',
        ]);
        Setting::create([
            'name' => 'token',
            'value' => 'YMsEfPkZVnAVfuXDZF4D',
            'description' => 'Token No Hp untuk digunakan mengirim WA',
        ]);
    }
}
