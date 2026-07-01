<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomePageSettingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ConcernController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ContactMessageController;

// Frontend Routes
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/concerns', [FrontendController::class, 'concerns'])->name('concerns.public');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Admin Routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/home-page-settings', [HomePageSettingController::class, 'edit'])->name('home-page-settings.edit');
    Route::post('/home-page-settings', [HomePageSettingController::class, 'update'])->name('home-page-settings.update');

    Route::resource('services', ServiceController::class)->except('show');
    Route::resource('concerns', ConcernController::class)->except('show');
    
    // Admin Messages
    Route::get('/messages', [ContactMessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [ContactMessageController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{message}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
