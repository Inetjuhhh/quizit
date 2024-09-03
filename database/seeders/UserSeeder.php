<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'rol_id' => 3,
        ]);
        $faker = fake('nl_NL');
        $user = \App\Models\User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@test.nl',
            'password' => bcrypt('password'),
            'rol_id' => 1,
        ]);
        $user = \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@test.nl',
            'password' => bcrypt('password'),
            'rol_id' => 2,
        ]);
        $user = \App\Models\User::create([
            'name' => 'user',
            'email' => 'user@test.nl',
            'password' => bcrypt('password'),
            'rol_id' => 3,
        ]);
    }
}
