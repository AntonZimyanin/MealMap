<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDishController;
use Illuminate\Support\Facades\Route;


/**
 * @OA\Get(
 *     path="/projects",
 *     @OA\Response(response="200", description="Display a listing of projects.")
 * )
 */


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/images/{filename}', function ($filename) {
    return response()->file(public_path('images/' . $filename));
});


Route::resource('user-dish', UserDishController::class);