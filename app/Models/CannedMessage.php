<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CannedMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'status'
    ];

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
