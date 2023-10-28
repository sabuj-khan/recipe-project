<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Helper\ResponseHelper;
use App\Models\Recipe;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RecipeController extends Controller
{
    function create(Request $request)
    {
        try {
            $user_id = $request->header('id');
            $recipe_name = $request->input('recipe_name');
            $recipe_type_id = $request->input('recipe_type_id');
            $ingredients = $request->input('ingredients');
            $cooking_instructions = $request->input('cooking_instructions');
            $prep_time = $request->input('prep_time');
            $cooking_time = $request->input('cooking_time');
            $difficulty_level = $request->input('difficulty_level');
            $cuisine_type = $request->input('cuisine_type');
            $dietary_preferences = $request->input('dietary_preferences');
            $image_url = Recipe::image($request->file('image'), $user_id, "");
            // return $image_url;
            // Create recipe
            Recipe::create([
                'user_id' => $user_id,
                'recipe_name' => $recipe_name,
                'recipe_type_id' => $recipe_type_id,
                'ingredients' => $ingredients,
                'cooking_instructions' => $cooking_instructions,
                'prep_time' => $prep_time,
                'cooking_time' => $cooking_time,
                'difficulty_level' => $difficulty_level,
                'cuisine_type' => $cuisine_type,
                'dietary_preferences' => $dietary_preferences,
                'image' => $image_url,
            ]);

            return ResponseHelper::Out('success', 'Recipe created!', 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', $e->getMessage(), 200);
        }
    }

    function edit($id)
    {
        return Recipe::recipe($id);
    }

    function update(Request $request, $id)
    {
        try {
            $recipe = Recipe::recipe($id);
            // return $recipe;
            $user_id = $request->header('id');
            $recipe_name = $request->input('recipe_name');
            $recipe_type_id = $request->input('recipe_type_id');
            $ingredients = $request->input('ingredients');
            $cooking_instructions = $request->input('cooking_instructions');
            $prep_time = $request->input('prep_time');
            $cooking_time = $request->input('cooking_time');
            $difficulty_level = $request->input('difficulty_level');
            $cuisine_type = $request->input('cuisine_type');
            $dietary_preferences = $request->input('dietary_preferences');
            $image_url = Recipe::image($request->file('image'), $user_id, $recipe->image);

            // Recipe Update
            $recipe->update([
                'user_id' => $user_id,
                'recipe_name' => $recipe_name,
                'recipe_type_id' => $recipe_type_id,
                'ingredients' => $ingredients,
                'cooking_instructions' => $cooking_instructions,
                'prep_time' => $prep_time,
                'cooking_time' => $cooking_time,
                'difficulty_level' => $difficulty_level,
                'cuisine_type' => $cuisine_type,
                'dietary_preferences' => $dietary_preferences,
                'image' => $image_url,
            ]);

            return ResponseHelper::Out('success', 'Recipe updated!', 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', $e->getMessage(), 200);
        }
    }

    function destroy($id)
    {
        try {
            $recipe = Recipe::recipe($id);

            $file_path = public_path() . "/" . $recipe->image;

            if (File::exists($file_path)) {
                File::delete($file_path);
            }
            $recipe->delete();

            return ResponseHelper::Out('success', 'Recipe Deleted!', 200);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', 'Request Fail!', 200);
        }
    }



    function recipeList(Request $request)
    {
        try {
            $user_id = $request->header('id');
            $allRecipe = Recipe::where('user_id', '=', $user_id)->get();

            return $allRecipe;
        } catch (Exception $e) {
            return ResponseHelper::Out("fail", "Request Fail!", 200);
        }
    }

    function recipeShowingById(Request $request, $id)
    {
        try {
            $user_id = $request->header('id');
            $singleRecipe = Recipe::where('id', '=', $id)->where('user_id', '=', $user_id)->first();

            return $singleRecipe;
        } catch (Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Request fail'
            ]);
        }
    }




}