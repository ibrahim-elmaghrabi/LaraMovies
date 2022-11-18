<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TvController;
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

Route::get('/' , [MovieController::class , 'index'])->name('movies.index');

Route::get('/movies' , [MovieController::class , 'index'])->name('movies.index');

Route::get('/movies/{movie}' , [MovieController::class , 'show'])->name('movies.show') ;



Route::get('/actors' , [ActorController::class , 'index'])->name('actors.index');

Route::get('/actors/page/{page?}' , [ActorController::class , 'index']);

Route::get('/actors/{actor}' , [ActorController::class , 'show'])->name('actors.show') ;



Route::get('/tv' , [TvController::class , 'index'])->name('tv.index');
Route::get('/tv/{tv}' , [TvController::class , 'show'])->name('tv.show');
