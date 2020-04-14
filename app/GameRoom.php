<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameRoom extends Model
{
    protected $fillable = [
        'play_time', 
        'play_device', 
        'comment',
        'game_title', 
        'vc_possible', 
        'available_skype',
        'available_discord', 
        'available_twitter', 
        'available_ingame_vc',
        'room_name',
    ];
}
