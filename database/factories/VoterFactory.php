<?php

namespace Database\Factories;

use App\Models\Vote;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vote::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'poll_id' => $this->faker->numberBetween(1, 100),
            'voter_id' => $this->faker->numberBetween(1, 100),
            'contender_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}
