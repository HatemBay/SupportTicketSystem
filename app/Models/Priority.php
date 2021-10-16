<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'bg_color',
        'text_color'
    ];

    /**
     * @return [type]
     * belongs to agent and admin
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }
}
