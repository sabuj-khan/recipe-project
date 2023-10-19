<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecipeShareController extends Controller
{
    public function index()
    {
        return view('pages.frontend.recipe_share.index');
    }
}
