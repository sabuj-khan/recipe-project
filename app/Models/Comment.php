<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['p_id', 'name', 'recipe_id', 'comment_text'];

    public function child()
    {
        return $this->hasMany(Comment::class, 'p_id');
    }
}
