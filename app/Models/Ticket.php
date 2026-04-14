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
        $this->belongsTo(User::class, 'engineer_id');
    }

    // $tiket = ['a', 'b']

    // $tiket->engineer->name
    // $comment_all = $tiket->comments()
    // $comment_all = []
    public function employee()
    {
        $this->belongsTo(User::class, 'employee_id');
    }

    public function comments()
    {
        $this->hasMany(Comment::class, 'user_id');
    }
}
