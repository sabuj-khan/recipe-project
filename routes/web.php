<?php

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\FRecipeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
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
Route::get('/recipes', [FRecipeController::class, 'index'])->name('recipe');

// auth page routes
Route::get('/login', [UserController::class, 'userLoginPage'])->name('login');
Route::get('/register', [UserController::class, 'userRegistrationPage'])->name('register');

// Authentication Route
Route::post('/user-register', [UserController::class, 'userRegistrationAction']);
Route::post('/user-login', [UserController::class, 'userLoginAction']);
Route::get('/user-info', [UserController::class, 'userProfileInfoShow'])->middleware([TokenVerifyMiddleware::class]);
Route::post('user-profile-update', [UserController::class, 'userProfileInfoUpdating'])->middleware([TokenVerifyMiddleware::class]);

// Logout Route
Route::get('/logout', [UserController::class, 'userLogoutAction']);

// Recipe Ajux Route
Route::post('/recipe-create', [RecipeController::class, 'recipeCreateAction'])->middleware([TokenVerifyMiddleware::class]);
Route::post('/recipe-update', [RecipeController::class, 'recipeUpdateAction'])->middleware([TokenVerifyMiddleware::class]);
Route::post('/recipe-delete', [RecipeController::class, 'recipeDeleteAction'])->middleware([TokenVerifyMiddleware::class]);
Route::get('/recipe-list', [RecipeController::class, 'recipeListDisplay'])->middleware([TokenVerifyMiddleware::class]);
Route::post('/recipe-by-id', [RecipeController::class, 'recipeShowingById'])->middleware([TokenVerifyMiddleware::class]);

