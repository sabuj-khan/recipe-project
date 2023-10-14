<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RecipeController extends Controller
{
    function recipeCreateAction(Request $request){
        try{
            $user_id = $request->header('id');
            $recipe_name = $request->input('recipe_name');
            $ingredients = $request->input('ingredients');
            $cooking_instructions = $request->input('cooking_instructions');
            $prep_time = $request->input('prep_time');
            $cooking_time = $request->input('cooking_time');
            $difficulty_level = $request->input('difficulty_level');
            $cuisine_type = $request->input('cuisine_type');
            $dietary_preferences = $request->input('dietary_preferences');

            $image = $request->file('image');
            $time = time();
            $file_name = $image->getClientOriginalName();
            $image_name = "{$user_id}-{$time}-{$file_name}";
            $image_url = "uploads/recipe/images{$image_name}";

            // recipe image File Upload
            $image->move(public_path('uploads/recipe/images'), $image_name);

            // Create recipe
            Recipe::create([
                'user_id'=>$user_id,
                'recipe_name'=>$recipe_name,
                'ingredients'=>$ingredients,
                'cooking_instructions'=>$cooking_instructions,
                'prep_time'=>$prep_time,
                'cooking_time'=>$cooking_time,
                'difficulty_level'=>$difficulty_level,
                'cuisine_type'=>$cuisine_type,
                'dietary_preferences'=>$dietary_preferences,
                'image'=>$image_url,
            ]);

            return response()->json([
                'status'=>'success',
                'message'=>'The recipe has been created successfully'
            ],201);
        }
        catch(Exception $e){
            return response()->json([
                'status'=>'fail',
                'message'=>'Something went wrong to create recipe'
            ]);
        }
    }


    function recipeUpdateAction(Request $request){
        try{
        $user_id = $request->header('id');
        $recipe_id = $request->input('id');
        $recipe_name = $request->input('recipe_name');
        $ingredients = $request->input('ingredients');
        $cooking_instructions = $request->input('cooking_instructions');
        $prep_time = $request->input('prep_time');
        $cooking_time = $request->input('cooking_time');
        $difficulty_level = $request->input('difficulty_level');
        $cuisine_type = $request->input('cuisine_type');
        $dietary_preferences = $request->input('dietary_preferences');

        if($request->hasFile('image')){
            $image = $request->file('image');
            $time = time();
            $file_name = $image->getClientOriginalName();
            $image_name = "{$user_id}-{$time}-{$file_name}";
            $image_url = "uploads/recipe/images{$image_name}";

            // Profile Picture Upload
            $image->move(public_path('uploads/recipe/images'), $image_name);

            // Old profile picture delete
            $imagePath=$request->input('image_path');
            File::delete($imagePath);

            // Recipe Update
            Recipe::where('id', '=', $recipe_id)->where('user_id', '=', $user_id)->update([
                'recipe_name'=>$recipe_name,
                'ingredients'=>$ingredients,
                'cooking_instructions'=>$cooking_instructions,
                'prep_time'=>$prep_time,
                'cooking_time'=>$cooking_time,
                'difficulty_level'=>$difficulty_level,
                'cuisine_type'=>$cuisine_type,
                'dietary_preferences'=>$dietary_preferences,
                'image'=>$image_url,
            ]);

            return response()->json([
                'status' => 'success',
                'message'=>'The recipe has been updated successfully'
            ]);


        }else{
            // Recipe updating with updating recipe image
            Recipe::where('id', '=', $recipe_id)->where('user_id', '=', $user_id)->update([
                'recipe_name'=>$recipe_name,
                'ingredients'=>$ingredients,
                'cooking_instructions'=>$cooking_instructions,
                'prep_time'=>$prep_time,
                'cooking_time'=>$cooking_time,
                'difficulty_level'=>$difficulty_level,
                'cuisine_type'=>$cuisine_type,
                'dietary_preferences'=>$dietary_preferences
            ]);

            return response()->json([
                'status' => 'success',
                'message'=>'The recipe has been updated successfully'
            ]);
        }


        }
        catch(Exception $e){
            return response()->json([
                'status' => 'fail',
                'message'=>'Request fail to updated the recipe'
            ]);
        }
    }

    function recipeDeleteAction(Request $request){
        try{
            $user_id = $request->header('id');
            $recipe_id = $request->input('id');
            $imagePath=$request->input('image_path');
            File::delete($imagePath);

            // Recipe deleting
            Recipe::where('id', '=', $recipe_id)->where('user_id', '=', $user_id)->delete();

            return response()->json([
                'status'=>'success',
                'message'=>'The recipe has been deleted successfully'
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'status' => 'fail',
                'message'=>'Request fail to delete the recipe'
            ]);
        }
    }



    function recipeListDisplay(Request $request){
        try{
            $user_id = $request->header('id');
            $allRecipe = Recipe::where('user_id', '=', $user_id)->get();

            return $allRecipe;
        }
        catch(Exception $e){
            return response()->json([
                'status' => 'fail',
                'message'=>'Request fail'
            ]);
        }
    }

    function recipeShowingById(Request $request){
        try{
            $user_id = $request->header('id');
            $recipe_id = $request->input('id');
            $singleRecipe = Recipe::where('id', '=', $recipe_id)->where('user_id', '=', $user_id)->first();

            return $singleRecipe;
        }
        catch(Exception $e){
            return response()->json([
                'status' => 'fail',
                'message'=>'Request fail'
            ]);
        }
    }




}
