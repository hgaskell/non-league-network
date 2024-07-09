<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PlayerMessagesController extends Controller
{

    public function index()
    {
        $userID = Auth::id();

        return view('admin.messages.index',[
            'messages' => Message::where('user_id', $userID)->paginate(50)
        ]);
    }

    public function show(Message $message) 
    {
        return view('admin.messages.show', [
            'message' => $message,
        ]);
    }


    public function store(Player $player)
    {

        request()->validate([
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $player->messages()->create([
            'subject' => request('subject'),
            'body' => request('message'),
            'email' => request('email'),
            'user_id' => $player->user_id,
            'unread' => true
        ]);

        return back()->with('success', "Message Sent!");;
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return back()->with('success', "Message Deleted!");
    }

    public function update(Message $message)
    {
        
        $attributes = [
            'unread' => false,
       ];

        $message->update($attributes);

        Log::info('Message updated successfully.');

        return view('admin.messages.show', [
            'message' => $message,
        ]);
    }
}
 