<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Position;
use App\Models\Region;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class PlayerController extends Controller
{
    public function index()
    {
        return view('players.index', [
            'players' => Player::active()->latest()->filter(request(['search','region','position']))->paginate(8)->withQueryString(),
            'currentRegion' => Region::firstWhere('slug', request('region')),
            'currentPosition' => Position::firstWhere('slug', request('position')),
            'positions' => Position::all()
        ]);
    }

    public function show(Player $player) 
    {
        return view('players.show', [
            'player' => $player,
        ]);
    }

}
