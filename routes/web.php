<?php

use App\Http\Controllers\Backend\CuisineController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\FRecipeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\RecipeController;
use App\Http\Controllers\Backend\RecipeTypeController;
use App\Http\Controllers\Frontend\AuthorController;
use App\Http\Controllers\Frontend\RecipeShareController;
use App\Http\Middleware\TokenVerifyMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// frontend page routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/recipe-share', [RecipeShareController::class, 'index'])->name('recipe.share')->middleware('tokenVerify');
Route::get('/recipes', [FRecipeController::class, 'index'])->name('recipe')->middleware('tokenVerify');
Route::get('/authors', [AuthorController::class, 'index'])->name('author');
// frontend api routes
Route::get('/get-recipe-in-home', [HomeController::class, 'getRecipe']);
Route::get('/get-recipe', [FRecipeController::class, 'getRecipe']);

// auth page routes
Route::get('/login', [UserController::class, 'userLoginPage'])->name('login')->middleware('auth');
Route::get('/forget-password', [UserController::class, 'forgetPasswordPage'])->name('forget.password');
Route::get('/reset-password', [UserController::class, 'resetPasswordPage'])->name('reset.password');
Route::get('/account', [UserController::class, 'account'])->name('account');

// Authentication Route
Route::post('/register-request', [UserController::class, 'userRegistration']);
Route::post('/login-request', [UserController::class, 'userLogin']);
Route::get('/user-info', [UserController::class, 'userProfileInfoShow'])->middleware(['tokenVerify']);
Route::post('user-profile-update', [UserController::class, 'userProfileInfoUpdating'])->middleware(['tokenVerify']);

// Logout Route
Route::get('/logout', [UserController::class, 'userLogout'])->middleware('tokenVerify');



Route::middleware('tokenVerify')->group(function(){
    // Recipe Routes
    Route::post('/recipe-create', [RecipeController::class, 'create']);
    Route::get('/recipe-edit/{id}', [RecipeController::class, 'edit']);
    Route::post('/recipe-update/{id}', [RecipeController::class, 'update']);
    Route::get('/recipe-delete/{id}', [RecipeController::class, 'destroy']);
});
Route::get('/recipe-list', [RecipeController::class, 'recipeList'])->middleware([TokenVerifyMiddleware::class]);
Route::get('/recipe-by-id/{id}', [RecipeController::class, 'recipeShowingById'])->middleware([TokenVerifyMiddleware::class]);



// backend admin panel routes
Route::prefix('/admin')->middleware(['tokenVerify', 'userType'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // user rotues
    Route::get('/user', [App\Http\Controllers\Backend\UserController::class, 'index'])->name('admin.user');
    // api route
    Route::get('/user-get', [App\Http\Controllers\Backend\UserController::class, 'getUser']);
    Route::get('/user-info/{id}', [App\Http\Controllers\Backend\UserController::class, 'userInfo']);
    Route::get('/user-delete/{id}', [App\Http\Controllers\Backend\UserController::class, 'destroy']);

    // recipe type rotue
    Route::get('/recipe-type', [RecipeTypeController::class, 'index'])->name('admin.recipe.type');
    // api routes
    // Cuisine Routes
    Route::get('/recipe-type-get', [RecipeTypeController::class, 'get']);
    Route::post('/recipe-type-store', [RecipeTypeController::class, 'store']);
    Route::get('/recipe-type-edit/{id}', [RecipeTypeController::class, 'edit']);
    Route::post('/recipe-type-update/{id}', [RecipeTypeController::class, 'update']);
    Route::get('/recipe-type-destroy/{id}', [RecipeTypeController::class, 'destroy']);
});