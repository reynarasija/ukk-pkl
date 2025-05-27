<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
// use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\PKLController;
use App\Http\Controllers\IndustriController;
use App\Http\Controllers\ProfileController;

Route::middleware(['auth'])->group(function () {
    Route::resource('pkl', PKLController::class);
    Route::resource('industri', IndustriController::class);
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');


    // API Routes
    // Route::prefix('api')->group(function () {
    //     Route::get('/users', [UserController::class, 'index']);
    //     Route::get('/users/{user}', [UserController::class, 'show']);
    //     Route::post('/users', [UserController::class, 'store']);
    //     Route::put('/users/{user}', [UserController::class, 'update']);
    //     Route::delete('/users/{user}', [UserController::class, 'destroy']);
    // });


});

require __DIR__.'/auth.php';