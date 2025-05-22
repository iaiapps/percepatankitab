<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin =
            User::create([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin1234'),
                'email_verified_at' => now(),
                'status' => '1',
            ]);
        $admin->assignRole('admin');

        $editor =
            User::create([
                'name' => 'editor',
                'email' => 'editor@gmail.com',
                'password' => Hash::make('editor1234'),
                'email_verified_at' => now(),
                'status' => '1',
            ]);
        $editor->assignRole('editor');

        // $user =
        //     User::create([
        //         'name' => 'user',
        //         'email' => 'user@gmail.com',
        //         'password' => Hash::make('user1234'),
        //         'email_verified_at' => now(),
        //     ]);
        // $user->assignRole('user');
    }
}
