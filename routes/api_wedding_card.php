<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Cara save data ke database
Route::post('/api/save-rsvp',[ApiController::class, 'store_rsvp'])->name('api.save_rsvp');

// cara show total power 
Route::get('/api/fetch-wish', [ApiController::class, 'fetch_wish'])->name('api.fetch_wish');