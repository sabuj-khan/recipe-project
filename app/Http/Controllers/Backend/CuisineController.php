<?php

namespace App\Http\Controllers\Backend;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\RecipeType;
use Illuminate\Http\Request;

class CuisineController extends Controller
{
    function create(Request $request)
    {
        RecipeType::create($request->all());

        return ResponseHelper::Out("success", "Recipe Type Created!", 200);
    }
    function edit($id)
    {
        return RecipeType::recipeType($id);
    }
    function update(Request $request, $id)
    {
        $cuisine = RecipeType::recipeType($id);
        $cuisine->update($request->all());

        return ResponseHelper::Out("success", "Recipe Type Updated!", 200);
    }

    function destroy($id)
    {
        RecipeType::recipeType($id)->delete();

        return ResponseHelper::Out("success", "Recipe Type Deleted!", 200); 
    }

}
