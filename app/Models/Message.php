<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = [
        'subject',
        'body',
        'email',
        'player_id',
        'user_id',
        'unread'
    ];

    use HasFactory;

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
