<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RecipeShareController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->header('id');
        $user = User::where('id', $user_id)->first();
        return view('pages.frontend.recipe_share.index', compact('user'));
    }
}
