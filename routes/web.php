<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AutocarController;
use App\Http\Controllers\EquipementController;
use App\Http\Controllers\SocieteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\AutocarEquipementController;
use App\Http\Controllers\AutocarOptionController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    if (Auth::check() && Auth::user()->isadmin == 1) {
        return view('admin.Layout.app');
    }
    return redirect('/')->with('error', 'Access denied.');
})->middleware('auth')->name('admin');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::resource('autocars', AutocarController::class);
Route::resource('societes', SocieteController::class);
Route::resource('options', OptionController::class);
Route::resource('equipements', EquipementController::class);
route::resource('autocarequipements', AutocarEquipementController::class);
route::resource('autocaroptions', AutocarOptionController::class);


});

Route::resource('users', UserController::class); //back door for sissions like user (just testing)


require __DIR__.'/auth.php';




