<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    function ratingRequest(Request $request)
    {
        Rating::create([
            'rating' => $request->rating,
            'recipe_id' => $request->recipe_id
        ]);

        return ResponseHelper::Out("success", "Rating Success!", 200);
    }
    function ratingGet($recipe_id)
    {
        return Rating::where('recipe_id', $recipe_id)->average('rating');
    }
}
