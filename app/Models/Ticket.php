<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'work_image',
        'title',
        'desc',
        'status',
        'priority',
        'tgl_sla',
        'employee_id',
        'engineer_id',
    ];

    public function engineer()
    {
        return $this->belongsTo(User::class, 'engineer_id');
    }

    // $tiket = ['a', 'b']

    // $tiket->engineer->name
    // $comment_all = $tiket->comments()
    // $comment_all = []
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }
}
