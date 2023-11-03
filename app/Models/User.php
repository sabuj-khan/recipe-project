<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['fullName', 'userName', 'email', 'password', 'profile_picture', 'phone', 'city', 'address', 'facebook_page'];


    public function recipe()
    {
        return $this->hasMany(Recipe::class, 'user_id');
    }
    public function followers()
    {
        return $this->hasMany(Follower::class, 'author_id');
    }
}
