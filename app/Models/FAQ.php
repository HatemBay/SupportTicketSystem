<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'f_a_q_category_id',
        'question',
        'answer',
    ];


    /**
     * @return [type]
     * belongs to admin
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function faqCategory()
    {
        return $this->belongsTo('App\Models\FAQCategory');
    }
}
