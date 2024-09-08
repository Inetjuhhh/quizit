<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'meerkeuze',
            'waar of niet waar',
            'vul de lege gaten in',
            'open'
        ];

        foreach ($types as $type) {
            \App\Models\Type::create([
                'type' => $type,
            ]);
        }
    }
}
