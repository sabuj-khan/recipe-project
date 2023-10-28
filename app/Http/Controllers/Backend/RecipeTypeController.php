<?php

namespace App\Http\Controllers\Backend;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\RecipeType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RecipeTypeController extends Controller
{
    public function index()
    {
        return view('pages.backend.recipe_type.index');
    }
    public function get()
    {
        return RecipeType::latest()->get();
    }
    function store(Request $request)
    {
        $slug = $this->generateSlug($request->name);
        RecipeType::create([
            'name' => $request->name,
            'slug' => $slug
        ]);

        return ResponseHelper::Out("success", "Recipe Type Created!", 200);
    }
    public function generateSlug($name)
    {
        $recipe_type = RecipeType::where('name', $name)->get();
        if ($recipe_type->count() > 0) {
            $count = $recipe_type->count();
            $slug = Str::slug($name).'-'.$count;
        }else{
            $slug = Str::slug($name);
        }
        return $slug;
    }
    function edit($id)
    {
        return RecipeType::recipeType($id);
    }
    function update(Request $request, $id)
    {
        $recipe_type = RecipeType::recipeType($id);
        // generate slug
        if ($recipe_type->name != $request->name) {
            $slug = $this->generateSlug($request->name);
        }else {
            $slug = $recipe_type->slug;
        }
        $recipe_type->update([
            'name' => $request->name,
            'slug' => $slug
        ]);

        return ResponseHelper::Out("success", "Recipe Type Updated!", 200);
    }

    function destroy($id)
    {
        RecipeType::recipeType($id)->delete();

        return ResponseHelper::Out("success", "Recipe Type Deleted!", 200); 
    }
}
