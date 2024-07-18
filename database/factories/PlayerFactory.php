<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Position;
use App\Models\Region;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'player_name' => $this->faker->name,
            'player_image' => 'images/29MSel27cWMyyIDwQixO.webp',
            'player_dob' => $this->faker->date(),
            'position_id' => $this->faker->numberBetween(1, 4),
            'region_id' => $this->faker->numberBetween(1, 4),
            'player_bio' => $this->faker->sentence,
            'player_height' => $this->faker->numberBetween(150, 200),
            'player_preferred_foot' => $this->faker->randomElement(['Left', 'Right']),
            'user_id' => 1,
            'player_status' => true,
            'slug' => $this->faker->slug
        ];
    }
}