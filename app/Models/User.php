<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $guarded = [

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cannedMessages() {
        return $this->hasMany('App\Models\CannedMessage');
    }

    public function categories() {
        return $this->hasMany('App\Models\Category');
    }

    public function departments() {
        return $this->hasMany('App\Models\Department');
    }

    public function FAQs() {
        return $this->hasMany('App\Models\FAQ');
    }

    public function FAQCategories() {
        return $this->hasMany('App\Models\FAQCategoriy');
    }

    public function knowledgeBases() {
        return $this->hasMany('App\Models\KnowledgeBase');
    }

    public function messages() {
        return $this->hasMany('App\Models\Message');
    }

    public function priorities() {
        return $this->hasMany('App\Models\Priority');
    }

    public function subCategories() {
        return $this->hasMany('App\Models\SubCategory');
    }

    public function tickets() {
        return $this->hasMany('App\Models\Ticket');
    }
}
