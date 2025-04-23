<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Http\Controllers\PostController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ActivityController;

/*Route::get('/', function () {
    return view('welcome');
})->name('home');*/

Route::redirect('/', 'posts')->name('inicio');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


Route::get('/inicio', [FrontendController::class, 'index'])->name('inicio');

Route::get('/equipo', [FrontendController::class, 'equipo'])->name('equipo');
Route::get('/activities', [ActivityController::class, 'index'])->name('activities');



Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'admin'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});


require __DIR__.'/auth.php';













