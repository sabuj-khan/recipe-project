<?php

namespace App\Models;

// use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'recipe_name', 'ingredients', 'cooking_instructions', 'prep_time', 'cooking_time', 'difficulty_level', 'cuisine_type', 'dietary_preferences', 'image'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
