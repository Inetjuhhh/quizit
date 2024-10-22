<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        $this->call([
            RolSeeder::class,
            KlasSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            TypeSeeder::class,
            QuestionMCSeeder::class,
            QuestionOSeeder::class,
            QuizSeeder::class,
            QuizAttemptSeeder::class,
            UserQuizAttemptSeeder::class,
            QuestionCategorySeeder::class,
            // UserQuizResponseSeeder::class,
        ]);
    }
}
