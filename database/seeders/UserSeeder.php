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

        $klassen = \App\Models\Klas::all();
        for($i = 0; $i < 20; $i++) {
            $user = \App\Models\User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('password'),
                'klas_id' => $klassen->random()->id,
                'rol_id' => 3,
            ]);
        }
    }
}
