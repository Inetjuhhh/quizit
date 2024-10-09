<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rollen = [
            'superadmin',
            'admin',
            'teacher',
            'user',
        ];

        foreach ($rollen as $rol) {
            \App\Models\Rol::create([
                'naam' => $rol,
            ]);
        }
    }
}
