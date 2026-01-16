<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\UserProfileController;

// Route::get('/', function () {
//     return view('welcome');
// });







Route::middleware('auth')->group(function () {
    // Admin All Route
    Route::controller(UserProfileController::class)->group(function () {
        Route::get('/logout', 'destroy')->name('logout');
        Route::get('/profile', 'Profile')->name('profile');
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');
        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/update/password', 'UpdatePassword')->name('update.password');
    });

    // Pages Route 
    Route::get('insights/{id}', [StoryController::class, 'wordDetails'])
        ->name('story.worddata');
    Route::resource('story', StoryController::class);
    Route::resource('quiz', QuizController::class);
    Route::resource('setting', SettingController::class);
});



Route::get('/', [HomepageController::class, 'index'])->middleware(['auth'])->name('home');

require __DIR__ . '/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });
