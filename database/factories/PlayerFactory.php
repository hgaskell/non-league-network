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
            'player_image' => $this->faker->imageUrl(),
            'player_dob' => $this->faker->date(),
            'player_position' => $this->faker->word,
            'player_region' => $this->faker->country,
            'player_bio' => $this->faker->sentence,
            'player_email' => $this->faker->unique()->safeEmail,
            'player_height' => $this->faker->numberBetween(150, 200),
            'player_preferred_foot' => $this->faker->randomElement(['Left', 'Right']),
            'player_tag' => $this->faker->word,
            'user_id' => User::factory(),
            'position_id' => Position::factory(),
            'region_id' => Region::factory(),
            'player_status' => 'Active',
            'slug' => $this->faker->slug
        ];
    }
}
