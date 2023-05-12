<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\WishController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // rsvp
    Route::get('/rsvp/index',[RsvpController::class, 'index'])->name('rsvp.index');
    Route::get('/rsvp/create', [RsvpController::class, 'create'])->name('rsvp.create');
    Route::post('/rsvp/create', [RsvpController::class, 'store' ])->name('rsvp.store');
    Route::get('/rsvp/{id}/edit', [RsvpController::class, 'edit'])->name('rsvp.edit');
    Route::post('/rsvp/{id}/edit', [RsvpController::class, 'update'])->name('rsvp.update');
    Route::delete('/rsvp/{id}/destroy', [RsvpController::class, 'destroy'])->name('rsvp.destroy');

    // wish
    Route::get('/wish/index',[WishController::class, 'index'])->name('wish.index');
    Route::get('/wish/create', [WishController::class, 'create'])->name('wish.create');
    Route::post('/wish/create', [WishController::class, 'store' ])->name('wish.store');
    Route::get('/wish/{id}/edit', [WishController::class, 'edit'])->name('wish.edit');
    Route::post('/wish/{id}/edit', [WishController::class, 'update'])->name('wish.update');
    Route::delete('/wish/{id}/destroy', [WishController::class, 'destroy'])->name('wish.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//api routes
require __DIR__.'/api_wedding_card.php';
