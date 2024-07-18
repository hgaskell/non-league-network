<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Position;
use App\Models\Player;
use App\Models\User;
use App\Models\Region;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        User::create([
            'name' => 'Harry Gaskell',
            'email' => 'harry@shopblocks.com',
            'password' => Hash::make('password')
        ]);

        Position::truncate();
        $positions = [
            ['name' => 'Goalkeeper','slug' => 'goalkeeper'],
            ['name' => 'Defender','slug' => 'defender'],
            ['name' => 'Midfielder','slug' => 'midfielder'],
            ['name' => 'Forward','slug' => 'forward']
        ];
        DB::table('positions')->insert($positions);

        Region::truncate();
        $regions = [
            ['name' => 'England','slug' => 'england'],
            ['name' => 'Wales','slug' => 'wales'],
            ['name' => 'Scotland','slug' => 'scotland'],
            ['name' => 'Northern Ireland','slug' => 'Northern Ireland']
        ];
        DB::table('regions')->insert($regions);

        DB::table('players')->delete();
        Player::factory(15)->create();

    }
}
 