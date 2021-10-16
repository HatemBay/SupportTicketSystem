<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnowledgeBase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sub_category_id',
        'title',
        'status',
        'description'
    ];


    /**
     * @return [type]
     * belongs to admin
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    /**
     * @return [type]
     * belongs to a sub category
     */
    public function subCategory()
    {
        return $this->belongsTo('App\Models\SubCategory');
    }
}
