<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment',
        'user_id',
        'ticket_id',
    ];

    public function ticket()
    {
        $this->belongsTo(Ticket::class, 'ticket_id');
    }

    public function user()
    {
        $this->belongsTo(User::class, 'user_id');
    }
}
