<?php

namespace Database\Seeders;


use App\Models\Cat;
use App\Models\Category;
use App\Models\Exam;
use App\Models\Movie;
use App\Models\Question;
use App\Models\Skill;
use Database\Factories\MovieFactory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()
            ->has(
            Movie::factory()->count(8)
        )
            ->count(5)->create();
//        Movie::factory()->count(8)->create();
    }
}
