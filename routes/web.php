<?php

use App\Http\Controllers\Backend\CuisineController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\FRecipeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\RecipeController;
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
Route::get('/recipe-share', [RecipeShareController::class, 'index'])->name('recipe.share');
Route::get('/recipes', [FRecipeController::class, 'index'])->name('recipe');
Route::get('/authors', [AuthorController::class, 'index'])->name('author');

// auth page routes
Route::get('/login', [UserController::class, 'userLoginPage'])->name('login');
Route::get('/forget-password', [UserController::class, 'forgetPasswordPage'])->name('forget.password');
Route::get('/reset-password', [UserController::class, 'resetPasswordPage'])->name('reset.password');
Route::get('/account', [UserController::class, 'account'])->name('account');

// Authentication Route
Route::post('/register-request', [UserController::class, 'userRegistrationAction']);
Route::post('/login-request', [UserController::class, 'userLoginAction']);
Route::get('/user-info', [UserController::class, 'userProfileInfoShow'])->middleware([TokenVerifyMiddleware::class]);
Route::post('user-profile-update', [UserController::class, 'userProfileInfoUpdating'])->middleware([TokenVerifyMiddleware::class]);

// Logout Route
Route::get('/logout', [UserController::class, 'userLogoutAction']);


// Cuisine Routes
Route::post('/recipe-type-create', [CuisineController::class, 'create']);
Route::get('/recipe-type-edit/{id}', [CuisineController::class, 'edit']);
Route::post('/recipe-type-update/{id}', [CuisineController::class, 'update']);
Route::get('/recipe-type-destroy/{id}', [CuisineController::class, 'destroy']);

// Recipe Routes
Route::post('/recipe-create', [RecipeController::class, 'create']);
Route::get('/recipe-edit/{id}', [RecipeController::class, 'edit']);
Route::post('/recipe-update/{id}', [RecipeController::class, 'update']);
Route::get('/recipe-delete/{id}', [RecipeController::class, 'destroy']);
Route::get('/recipe-list', [RecipeController::class, 'recipeList'])->middleware([TokenVerifyMiddleware::class]);
Route::get('/recipe-by-id/{id}', [RecipeController::class, 'recipeShowingById'])->middleware([TokenVerifyMiddleware::class]);



// backend admin panel routes
Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');