<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->header('id');
        $user = User::where('id', $user_id)->first();
        return view('pages.frontend.home.index', compact('user'));
    }
    public function getRecipe()
    {
        return Recipe::take(3)->latest()->get();
    }
}
