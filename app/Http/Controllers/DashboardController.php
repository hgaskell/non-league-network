<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userID = Auth::id();

        $activePlayersCount = Player::where('user_id', $userID)->where('player_status',1)->count();
        $unreadMessagesCount = Message::where('user_id', $userID)->where('unread',1)->count();

        return view('admin.dashboard',[
            'activePlayersCount' => $activePlayersCount,
            'unreadMessagesCount' => $unreadMessagesCount
        ]);
    }
}
