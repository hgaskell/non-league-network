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
        Player::truncate();
        Region::truncate();

        Player::factory(5)->create();

    }
}
