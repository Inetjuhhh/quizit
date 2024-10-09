<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KlasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $klassen = [
            'TTSDB-sd4o20n',
            'TTSDB-sd4o21a',
            'TTSDB-sd4o21b',
            'TTSDB-sd4o21n',
            'TTSDB-sd4o22a',
            'TTSDB-sd4o22e',
            'TTSDB-sd4o22n',
            'TTSDB-sd4o23a',
            'TTSDB-sd4o23b',
            'TTSDB-sd4o23e',
            'TTSDB-sd4o23n',
            'TTSDB-sd4o24a',
            'TTSDB-sd4o24b',
            'TTSDB-sd4o24c',
        ];
        foreach ($klassen as $klas) {
            \App\Models\Klas::create([
                'name' => $klas,
            ]);
        }
    }
}
