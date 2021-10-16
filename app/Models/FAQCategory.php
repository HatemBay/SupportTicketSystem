<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name'
    ];

    /**
     * @return [type]
     * belongs to admin
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
