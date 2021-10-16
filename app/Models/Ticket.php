<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'department_id',
        'priority_id',
        'title',
        'description',
        'status',
        'reply_status'
    ];

    /**
     * A ticket is sent by a customer
     * @return use Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function priority()
    {
        return $this->belongsTo('App\Models\Priority');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Deptartment');
    }
}
