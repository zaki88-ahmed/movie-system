<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $i;
        $i++;
         return [
             'name' => [
                 'en' => $this->faker->word(),
                 'ar' => $this->faker->word(),
             ],
            'parent_id' => $i,
        ];


    }
}
