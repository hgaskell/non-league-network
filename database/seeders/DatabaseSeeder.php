<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Position;
use App\Models\Player;
use App\Models\User;
use App\Models\Region;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Position::truncate();

        Player::factory()->goalkeeper();
        Player::factory()->defender();
        Player::factory()->midfielder();
        Player::factory()->forward();

        Region::factory()->england();
        Region::factory()->wales();
        Region::factory()->scotland();
        Region::factory()->northernIreland();

        Player::factory(5)->create();

    }
}
 