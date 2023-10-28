<?php

namespace App\Models;

// use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\File;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'recipe_name', 'recipe_type_id', 'ingredients', 'cooking_instructions', 'prep_time', 'cooking_time', 'difficulty_level', 'cuisine_type', 'dietary_preferences', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function image($image, $user_id, $imageURL)
    {
        if ($image) {
            if ($imageURL) {
                $file_path = public_path() ."/". $imageURL;

                if (File::exists($file_path)) {
                    File::delete($file_path);
                }
                $time = time();
                $file_name = $image->getClientOriginalName();
                $image_name = "{$user_id}-update-{$time}-{$file_name}";
                $image_url = "uploads/images/recipes/{$image_name}";
                // recipe image File Upload
                $image->move(public_path('uploads/images/recipes'), $image_name);
                return $image_url;
            } else {
                $time = time();
                $file_name = $image->getClientOriginalName();
                $image_name = "{$user_id}-{$time}-{$file_name}";
                $image_url = "uploads/images/recipes/{$image_name}";
                // recipe image File Upload
                $image->move(public_path('uploads/images/recipes'), $image_name);
                return $image_url;
            }
        }
    }

    public static function recipe($id)
    {
        return Recipe::findOrFail(intval($id));
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');   
    }
}