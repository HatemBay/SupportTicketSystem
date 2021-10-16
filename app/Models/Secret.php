<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secret extends Model
{
    use HasFactory;

    protected $guarded = [];

     function customer()
    {
        $this->belongsTo('App\Models\Customer');
    }
}
