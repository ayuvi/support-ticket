<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'ticket_id', 'user_id','comment'
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
