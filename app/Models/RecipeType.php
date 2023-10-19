<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeType extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name'];

    public static function recipeType($id)
    {
        return RecipeType::findOrFail(intval($id));
    }
}
