<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'user_id',
        'body'
    ];

    public function ticket()
    {
        return $this->belongsTo('App\Models\Ticket', 'ticket_id');
    }

    /**
     * @return [type]
     * belongs to customer and agent
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // public function agent()
    // {
    //     return $this->belongsTo('App\Models\Agent');
    // }
}
