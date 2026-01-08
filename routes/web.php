<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseItemController;
use App\Http\Controllers\ExpeseFilterController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\SettingController;
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
    Route::resource('account', AccountController::class);
    Route::resource('category',ExpenseCategoryController::class);
    Route::resource('expense', ExpenseItemController::class);
    Route::get('calender', function() {
        return view('frontend.calender.index');
    });
    Route::resource('setting', SettingController::class);
    Route::resource('expensefilter', ExpeseFilterController::class);
    Route::post('/expensefilter', [ExpeseFilterController::class,'filter'])->name('expensefilter.filter');

});



Route::get('/', HomepageController::class,'index')->middleware(['auth'])->name('home');

require __DIR__.'/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });
