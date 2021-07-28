<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'birthday',
        'about',
        'avatar_url',
        'cover_image_url',
        'phone_number',
        'address',
    ];

    // protected $hidden = ['user_id'];

    protected $casts = [
        'birthday' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function getBirthdayAttribute($value)
    {
        $date = new Carbon($value);
        return $date->format('Y-m-d');
    }

    public function getFirstNameAttribute()
    {
        return $this->user->first_name;
    }

    public function getLastNameAttribute()
    {
        return $this->user->last_name;
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getEmailAttribute()
    {
        return $this->user->email;
    }

    public function getUsernameAttribute()
    {
        return $this->user->username;
    }
}
