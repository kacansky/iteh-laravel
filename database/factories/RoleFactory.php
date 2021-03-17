<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'role'=>$this->faker->firstName().' '.$this->faker->lastName,
            'movie_id'=>$this->faker->numberBetween($min = 1, $max = 20),
            'actor_id'=>$this->faker->numberBetween($min = 1, $max = 20)
        ];
    }
}
