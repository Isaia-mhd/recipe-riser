<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\Auth\AuthController;
use \App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('auth',)->group(function (){
    //USer
    Route::get('profile/edit/{user}', [AuthController::class, 'edit'])->name('profile.edit');
    Route::put('profile/update/{user}', [AuthController::class, 'update'])->name('profile.update');
    Route::get('profile/{user}', [AuthController::class, 'profile'])->name('profile');

    //Notifications
    Route::get('notifications', function (){
        $user = auth()->user();
        $notifications = $user->notifications;
        $user->unreadNotifications->markAsRead();
       return view('pages.auth.notifications', ['notifications' => $notifications]);
    })->name('notifications');

    // COMMENTS
    Route::post("comments/new/recipe/{recipe}", [CommentController::class,"store"])->name('comment.new');
    Route::delete("comments/delete/{comment}", [CommentController::class,"destroy"])->name('comment.delete');

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
