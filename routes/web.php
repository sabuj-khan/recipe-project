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
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\RatingController;
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
Route::middleware('authorCheck')->group(function () {

    // frontend page routes
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/recipe-share', [RecipeShareController::class, 'index'])->name('recipe.share')->middleware('tokenVerify');
    Route::get('/recipes', [FRecipeController::class, 'index'])->name('recipe');
    Route::get('/recipes-by-id/{id}', [FRecipeController::class, 'show'])->name('recipe.by.id');
    Route::get('/authors', [AuthorController::class, 'index'])->name('author');
    Route::get('/author-recipes', [AuthorController::class, 'authorRecipes'])->name('author.recipes')->middleware('tokenVerify');
    Route::get('/account', [UserController::class, 'account'])->name('account');

    // frontend recipe api routes
    Route::get('/get-recipe-in-home', [HomeController::class, 'getRecipe']);
    Route::get('/get-recipe', [FRecipeController::class, 'getRecipe']);
    Route::get('/get-recipe-type', [FRecipeController::class, 'getRecipeType']);
    Route::get('/check-follow', [FRecipeController::class, 'checkFollower']);
    Route::post('/follow-author', [FRecipeController::class, 'followAuthor']);


    // comment api routes
    Route::post('/comment', [CommentController::class, 'comment'])->name('comment');
    Route::get('/comment-get/{recipe_id}', [CommentController::class, 'get'])->name('comment.get');
    Route::get('/get-reply-by-comment-id/{p_id}', [CommentController::class, 'getReplyByCommentId']);
    Route::post('/comment-reply', [CommentController::class, 'commentReply']);

    // author api routes
    Route::get('/get-author', [AuthorController::class, 'getAuthor']);
    Route::post('/profile-update', [AuthorController::class, 'profileUpdate'])->name('profile.update');
    Route::get('/author-recipes-get', [AuthorController::class, 'authorRecipesGet'])->name('author.recipes.get')->middleware('tokenVerify');
    Route::get('/author-recipe-edit/{id}', [AuthorController::class, 'authorRecipeEdit'])->middleware('tokenVerify');
    Route::get('/author-recipe-update/{id}', [AuthorController::class, 'authorRecipeUpdate'])->middleware('tokenVerify');
});

// reting api routes
Route::post('/rating-request', [RatingController::class, 'ratingRequest']);
Route::get('/rating-get/{recipe_id}', [RatingController::class, 'ratingGet']);

// auth page routes
Route::get('/login', [UserController::class, 'userLoginPage'])->name('login')->middleware('auth');
Route::get('/forget-password', [UserController::class, 'forgetPasswordPage'])->name('forget.password');
Route::get('/reset-password', [UserController::class, 'resetPasswordPage'])->name('reset.password');

// Authentication Route
Route::post('/register-request', [UserController::class, 'userRegistration']);
Route::post('/login-request', [UserController::class, 'userLogin']);
Route::get('/user-info', [UserController::class, 'userProfileInfoShow'])->middleware(['tokenVerify']);
Route::post('user-profile-update', [UserController::class, 'userProfileInfoUpdating'])->middleware(['tokenVerify']);

// Logout Route
Route::get('/logout', [UserController::class, 'userLogout'])->middleware('tokenVerify');



Route::middleware('tokenVerify')->group(function () {
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