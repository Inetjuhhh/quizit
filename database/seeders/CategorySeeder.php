<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = new \App\Models\Category();
        $category->name = 'C#';
        $category->save();

        $category = new \App\Models\Category();
        $category->name = 'PHP';
        $category->save();

        $category = new \App\Models\Category();
        $category->name = 'HTMLCSS';
        $category->save();

        $category = new \App\Models\Category();
        $category->name = 'Javascript';
        $category->save();

        $category = new \App\Models\Category();
        $category->name = 'Python';
        $category->save();

        $category = new \App\Models\Category();
        $category->name = 'Muziek';
        $category->save();
    }
}
