<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $x = 1;
        static $y = 1;

        return [
            'salary' => $this->faker->numberbetween(1, 3) * 300,
            'isSuperAdmin' => $x,
            'user_id' => $x,
        ];
    }
}
