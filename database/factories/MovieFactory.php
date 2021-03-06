<?php

namespace Database\Factories;

use App\Models\Movie;
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
    public function definition()
    {
        return [
            'title'=>$this->faker->word,
            'plot'=>$this->faker->realText($maxNbChars = 100, $indexSize = 2),
            'length'=>$this->faker->numberBetween($min = 60, $max = 200)
        ];
    }
}
