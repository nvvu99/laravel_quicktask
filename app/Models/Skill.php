<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $hidden = ['personal_profile_id'];

    public function profile()
    {
        return $this->belongsTo(PersonalProfile::class, 'personal_profile_id');
    }

    public function getUserIdAttribute()
    {
        return $this->profile->user_id;
    }
}
