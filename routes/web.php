<?php

use App\Http\Controllers\AddSongController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


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

 // Registration route
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Login route
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// Log out route
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// crappy fix to redirect
Route::get('/home', function (){
    return view('posts');
});

// Posts
Route::get('/', [PostController::class, 'index'])->name('posts');
Route::post('/', [PostController::class, 'store']);

// Add songs
Route::get('/addSong', [AddSongController::class, 'index'])->name('addSong');
Route::post('/addSong', [AddSongController::class, 'store']);

// URL to each db song
Route::get('/song/{id}', [SongController::class, 'index'])->name('song');

//Query builder
Route::get('/search', [SearchController::class, 'search'])->name('search');

