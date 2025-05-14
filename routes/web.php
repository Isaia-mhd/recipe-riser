<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('auth',)->group(function (){
    Route::delete('recipes/delete/{recipe}', [RecipeController::class, 'destroy'])->name('recipe.delete');
    Route::put('recipes/update/{recipe}', [RecipeController::class, 'update'])->name('recipe.update');
    Route::get('recipes/edit/{recipe}', [RecipeController::class, 'edit'])->name('recipe.edit');
    Route::post('recipes/new', [RecipeController::class, 'store'])->name('recipe.store');
    Route::get('recipes/new', [RecipeController::class, 'create'])->name('recipe.create');
    Route::get('recipes/show/{recipe}', [RecipeController::class, 'show'])->name('recipe.show');
    Route::get('recipes', [RecipeController::class, 'index'])->name('recipe.index');

    //Log Out
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::middleware('guest')->group(function (){
   Route::get('register', function (){ return view('pages.auth.register');})->name('register');
   Route::get('login', function (){ return view('pages.auth.login');})->name('login');

   //AUTH
   Route::post('register', [AuthController::class, 'register'])->name('auth.register');
   Route::post('login', [AuthController::class, 'login'])->name('auth.login');

});
