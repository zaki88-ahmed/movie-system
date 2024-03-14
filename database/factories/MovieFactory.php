<?php

namespace Database\Factories;

use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */


     //https://github.com/fzaninotto/Faker

    public function definition()
    {
        static $i = 0;
        $x = $this->faker->numberbetween(0, 8);
        $y = $this->faker->dateTime()->format('d-m-Y H:i:s');
//        $y = json_encode([$this->faker->dateTime()->format('d-m-Y H:i:s')]);
//        $y = '2021-12-29 15:34:24';
//        $i++;
//        return [
//            'name' => json_encode([
//                'en' => $this->faker->word(),
//                'ar' => $this->faker->word(),
//            ]),
//            'desc' => json_encode([
//                'en' => $this->faker->text(5000),
//                'ar' => $this->faker->text(5000),
//            ]),
//            'img' => "exams/$i.png",
//            'questions_no' => 15,
//            'difficulty' => $this->faker->numberbetween(1, 5),
//            'duration_mins' => $this->faker->numberbetween(1, 3) * 30,         //time will be 30 or 60 or 90 mins
//        ];
        return [
            'title' => [
                'en' => $this->faker->word(),
                'ar' => $this->faker->word(),
            ],
            'summary' => [
                'en' => $this->faker->text(50, false),
                'ar' => $this->faker->text(50, false),
            ],
//            'duration' => [
//                'en' => $x,
//                'ar' => $x,
//            ],
//            'launched_year' => [
//                'en' => $y,
//                'ar' => $y,
//            ],
            'duration' => $this->faker->numberbetween(0, 8),
//            'launched_year' => $this->faker->dateTime(),
            'launched_year' => Carbon::now(),
            'isFree' => $i,
//            'category_id' => 2,
        ];
    }
}
