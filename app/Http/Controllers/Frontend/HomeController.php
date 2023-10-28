<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.frontend.home.index');
    }
    public function getRecipe()
    {
        return Recipe::take(3)->latest()->get();
    }
}
