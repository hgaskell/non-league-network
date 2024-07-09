<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PlayerMessagesController;
use App\Http\Controllers\AdminPlayerController;
use App\Http\Controllers\DashboardController;
use App\Models\Player;
use App\Models\Position;
use App\Models\Region;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        'players' => Player::active()->latest()->with(['position','region'])->take(4)->get()
    ]);
});

Route::get('/players', [PlayerController::class, 'index'])->name('players');
Route::get('players/{player:slug}', [PlayerController::class, 'show']);
Route::post('players/{player:slug}/messages', [PlayerMessagesController::class, 'store']);

Route::middleware('guest')->group(function(){
    Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
    Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

    Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
    Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
});

Route::middleware('auth')->group(function(){
    Route::post('logout', [SessionsController::class, 'destroy']);

    Route::get('admin',[DashboardController::class, 'index'])->name('admin');

    Route::get('admin/players', [AdminPlayerController::class, 'index']);
    Route::post('admin/players', [AdminPlayerController::class, 'store']);
    Route::get('admin/players/create', [AdminPlayerController::class, 'create']);
    Route::get('admin/players/{player}/edit', [AdminPlayerController::class, 'edit']);
    Route::patch('admin/players/{player}', [AdminPlayerController::class, 'update']);
    Route::delete('admin/players/{player}', [AdminPlayerController::class, 'destroy']);

    Route::get('admin/messages', [PlayerMessagesController::class, 'index']);
    Route::get('admin/messages/{message}', [PlayerMessagesController::class, 'show']);
    Route::delete('admin/messages/{message}', [PlayerMessagesController::class, 'destroy']);
    Route::patch('admin/messages/{message}', [PlayerMessagesController::class, 'update']);
});






