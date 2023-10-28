<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;

class FRecipeController extends Controller
{
    public function index()
    {
        return view('pages.frontend.recipe.index');
    }
    public function getRecipe()
    {
        return Recipe::latest()->with('author')->paginate(3);
    }
}
