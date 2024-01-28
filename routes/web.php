<?php

use App\Http\Controllers\MeteoDataController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/')->name('meteo.')->controller(MeteoDataController::class)->group(function () {
    Route::get('',  'show')->name('show');
    Route::put('',  'update')->name('update');
});

