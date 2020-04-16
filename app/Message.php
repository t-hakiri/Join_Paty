<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $fillable = [
        'body',
        'room_id',
        'user_id',
    ];

    public function users()
    {
      return $this->belongsToMany('App\User', 'message_user');
    }

    public function room()
    {
      return $this->hasOne('App\MessageUser');
    }
}
