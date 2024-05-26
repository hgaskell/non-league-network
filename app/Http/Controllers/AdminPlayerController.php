<?php

namespace App\Http\Controllers;
use App\Models\Player;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AdminPlayerController extends Controller
{
    public function index()
    {
        $userID = Auth::id();

        return view('admin.players.index',[
            'players' => Player::where('user_id', $userID)->paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.players.create');
    }

    public function store()
    {
        request()->merge([
            'player_status' => request()->has('player_status')
        ]);

       $attributes = request()->validate([
            'player_name' => 'required',
            'player_dob' => 'required',
            'position_id' => ['required', Rule::exists('positions', 'id')],
            'region_id' => ['required', Rule::exists('regions', 'id')],
            'player_bio' => 'required',
            'player_height' => 'required',
            'player_preferred_foot' => 'required',
            'player_image' => 'required|image|max:2048',
            'player_status' => 'boolean'
       ]);

       $attributes['slug'] = Str::slug($attributes['player_name'], '-');

       //HANDLE DUPLICATE SLUGS
       $originalSlug = $attributes['slug'];
       $count = 1;
       while (Player::whereSlug($attributes['slug'])->exists()) {
           $attributes['slug'] = $originalSlug . '-' . $count++;
       }

        if (request()->hasFile('player_image')) {
            $filename = Str::random(20) . '.' . request()->player_image->extension();
            $path = request()->player_image->storeAs('images', $filename, 'public');
            $attributes['player_image'] = $path;
        }

        $player_status = request()->has('player_status') ? (bool)request()->player_status : false;
        $attributes['player_status'] = $player_status;

       $attributes['user_id'] = auth()->id();

       Player::create($attributes);

       return redirect('/');
    }

    public function edit(Player $player)
    {
        //dd($player);
        return view('admin.players.edit',[
            'player' => $player
        ]);
    }

    public function update(Player $player)
    {

        $attributes = request()->validate([
            'player_name' => 'required',
            'player_dob' => 'required',
            'position_id' => ['required', Rule::exists('positions', 'id')],
            'region_id' => ['required', Rule::exists('regions', 'id')],
            'player_bio' => 'required',
            'player_height' => 'required',
            'player_preferred_foot' => 'required',
            'player_image' => 'image|max:2048',
            'player_status' => 'boolean'
       ]);

       $attributes['slug'] = Str::slug($attributes['player_name'], '-');

       //HANDLE DUPLICATE SLUGS
       $originalSlug = $attributes['slug'];
       $count = 1;
       while (Player::whereSlug($attributes['slug'])->exists()) {
           $attributes['slug'] = $originalSlug . '-' . $count++;
       }

       if (request()->hasFile('player_image')) {
            $filename = Str::random(20) . '.' . request()->player_image->extension();
            $path = request()->player_image->storeAs('images', $filename, 'public');
            $attributes['player_image'] = $path;
        }

        $player_status = request()->has('player_status') ? (bool)request()->player_status : false;
        $attributes['player_status'] = $player_status;

        $player->update($attributes);

        return back()->with('success','Player Updated');
    }

    public function destroy(Player $player)
    {
        $player->delete();

        return back()->with('success', "Player Deleted");
    }
}
