<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['fullName', 'userName', 'email', 'password', 'profile_picture'];


    public function recipe(){
        return $this->hasMany(Recipe::class);
    }
}
