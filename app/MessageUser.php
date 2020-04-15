<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MessageUser extends Pivot
{
    protected $table = 'message_user';

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
