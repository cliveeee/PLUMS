<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
            CoursesTableSeeder::class,
            QuizSeeder::class,
            CertificatesTableSeeder::class,
            QuestionsTableSeeder::class,
            QuizQuestionSeeder::class,
            AnswersTableSeeder::class,
//            QuizQuestionSeeder::class,
        ]);
    }
}
