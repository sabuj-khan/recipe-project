<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->header('id');
        $user = User::with('recipe')->where('id', $user_id)->first();
        return view('pages.frontend.author.index', compact('user'));
    }
    function authorRecipes(Request $request)
    {
        $user_id = $request->header('id');
        $user = User::where('id', $user_id)->first();
        $recipes = Recipe::where('user_id', $user->id)->latest()->get();
        return view('pages.frontend.author_recipe.index', compact('user', 'recipes'));
    }
    function getAuthor(Request $request)
    {
        return User::with('recipe', 'followers')->get();
    }
    function profileUpdate(Request $request)
    {
        $user_id = $request->header('id');
        $user = User::where('id', $user_id)->first();
        $user->update([
            'fullName' => $request->fullName,
            'userName' => $request->userName,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
            'facebook_page' => $request->facebook_page,
        ]);

        return redirect()->back()->with('success', 'Profile Updated!');
        // return ResponseHelper::Out("success", "Profile Updated!", 200);
    }
    function authorRecipesGet(Request $request)
    {
        $user_id = $request->header('id');
        $user = User::where('id', $user_id)->first();
        $recipes = Recipe::where('user_id', $user->id)->latest()->get();
        return view('components.frontend.author_recipe.recipe-list', compact('recipes'))->render();
    }
    function authorRecipeEdit($id)
    {
        return Recipe::findOrFail(intval($id));
    }
    // function authorRecipeUpdate(Request $request)
    // {

    // }
}
