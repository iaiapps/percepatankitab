<?php

namespace Database\Seeders;

use App\Models\Landing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Landing::create([
            'name' => 'diskon',
            'value' => '1',
            'description' => 'tampilkan diskon atau tidak',
        ]);
        Landing::create([
            'name' => 'countdown_diskon',
            'value' => '2025-07-03 23:59:59',
            'description' => 'Hitung mundur diskon',
        ]);
        Landing::create([
            'name' => 'besar_diskon',
            'value' => '30%',
            'description' => 'Jumlah besar diskon',
        ]);
        Landing::create([
            'name' => 'harga_awal',
            'value' => 'Rp. 500.000',
            'description' => 'Harga awal buku',
        ]);
        Landing::create([
            'name' => 'harga_diskon',
            'value' => 'Rp. 350.000',
            'description' => 'Harga setelah diskon',
        ]);
        Landing::create([
            'name' => 'kontak_alamat',
            'value' => 'Jl. Sriti, Kelurahan Banjar Sengon, Kecamatan Patrang, Jember, Jawa Timur - Indonesia',
            'description' => 'Alamat web',
        ]);
        Landing::create([
            'name' => 'kontak_hp',
            'value' => '+6281298440068',
            'description' => 'Nomor Hp',
        ]);
        Landing::create([
            'name' => 'kontak_email',
            'value' => 'ansacademy18@gmail.com',
            'description' => 'Alamat Email',
        ]);
    }
}
