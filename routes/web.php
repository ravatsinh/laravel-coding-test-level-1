<?php

use Illuminate\Support\Facades\Route;

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


Route::middleware(['auth'])->group(function () {
    Route::resource('events',\App\Http\Controllers\EventsController::class);
});
Route::get('events',[\App\Http\Controllers\EventsController::class,'index'])->name('events.index');
Route::get('/',[\App\Http\Controllers\EventsController::class,'index'])->name('events.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/external-api', [\App\Http\Controllers\EventsController::class, 'externalApi'])->name('external-api');
