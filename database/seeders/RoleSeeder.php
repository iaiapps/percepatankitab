<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'editor',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'guest',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'reseller',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'affiliator',
            'guard_name' => 'web'
        ]);
    }
}
