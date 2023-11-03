<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Follower;
use App\Models\Rating;
use App\Models\Recipe;
use App\Models\RecipeType;
use App\Models\User;
use Illuminate\Http\Request;

class FRecipeController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->header('id');
        $user = User::where('id', $user_id)->first();
        return view('pages.frontend.recipe.index', compact('user'));
    }
    public function getRecipe(Request $request)
    {
        if (isset($request->recipe_type_id)) {
            $recipes = Recipe::where('recipe_type_id', $request->recipe_type_id)->latest()->with('author', 'recipeRating', 'comment')->get();
        } else if (isset($request->author)) {
            $recipes = Recipe::where('user_id', $request->author)->latest()->with('author', 'recipeRating', 'comment')->get();
        } else {
            $recipes = Recipe::latest()->with('author', 'recipeRating', 'comment')->get();
        }

        $user_id = $request->header('id');
        return response()->json([
            'recipes' => $recipes,
            'user_id' => $user_id,
        ]);
    }
    public function getRecipeType(Request $request)
    {
        return RecipeType::latest()->get();
    }
    public function show(Request $request, $id)
    {
        $user_id = $request->header('id');
        $user = User::where('id', $user_id)->first();
        // return $user;
        $recipe = Recipe::findOrFail(intval($id));
        $comments = Comment::with('child')->where('p_id', 0)->where('recipe_id', $recipe->id)->get();
        return view('pages.frontend.recipe.show', compact('recipe', 'user', 'comments'));
    }
    public function getAuthor(Request $request)
    {
        return $request->header('id');
    }

    public function checkFollower(Request $request)
    {
        // return $request->all();
        return Follower::where('author_id', $request->author_id)->where('user_id', $request->user_id)->first();
    }
    public function followAuthor(Request $request)
    {
        $follower = Follower::where('author_id', $request->author_id)->where('user_id', $request->user_id)->first();
        if ($follower == null) {
            $follow = new Follower();
            $follow->author_id = $request->author_id;
            $follow->user_id = $request->user_id;
            $follow->follow_id = 1;
            $follow->save();

            return ResponseHelper::Out("success", "Follow", 200);
        } else {
            if ($follower->follow_id == 0) {
                $follower->follow_id = 1;
                $follower->update();

                return ResponseHelper::Out("success", "Follow", 200);
            } else {
                $follower->follow_id = 0;
                $follower->update();

                return ResponseHelper::Out("success", "Unfollow", 200);
            }
        }
    }
}
