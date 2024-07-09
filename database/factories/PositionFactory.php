<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Position;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->slug
        ];
    }

    public function goalkeeper()
    {
        return [
            'name' => 'Goalkeeper',
            'slug' => 'goalkeeper'
        ];
    }

    public function defender()
    {
        return [
            'name' => 'Defender',
            'slug' => 'defender'
        ];
    }

    public function midfielder()
    {
        return [
            'name' => 'Midfielder',
            'slug' => 'midfielder'
        ];
    }

    public function forward()
    {
        return [
            'name' => 'Forward',
            'slug' => 'forward'
        ];
    }
}
 