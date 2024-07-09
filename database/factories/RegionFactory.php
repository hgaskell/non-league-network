<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Position;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RegionFactory extends Factory
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

    public function england()
    {
        return [
            'name' => 'England',
            'slug' => 'england'
        ];
    }

    public function wales()
    {
        return [
            'name' => 'Wales',
            'slug' => 'wales'
        ];
    }

    public function scotland()
    {
        return [
            'name' => 'Scotland',
            'slug' => 'scotland'
        ];
    }

    public function northernIreland()
    {
        return [
            'name' => 'Northern Ireland',
            'slug' => 'northern-ireland'
        ];
    }
}
