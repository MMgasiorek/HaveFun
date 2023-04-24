<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemoriesController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/events', [EventController::class, 'index']);
Route::get('/show_event/{id}/{type}', [EventController::class, 'show']);
Route::post('/update_event', [EventController::class, 'update']);
Route::get('/create_event', [EventController::class, 'create']);
Route::post('/store_event', [EventController::class, 'store']);
Route::get('/delete_event/{id}', [EventController::class, 'delete']);




Route::get('/places', [PlaceController::class, 'index']);
Route::get('/show_place/{id}', [PlaceController::class, 'show']);


Route::get('/profile', [UserController::class, 'show']);
Route::get('/edit_user', [UserController::class, 'edit']);
Route::post('/update_user', [UserController::class, 'update']);


Route::get('/memories', [MemoriesController::class, 'index']);
Route::get('/show_memory/{id}', [MemoriesController::class, 'show']);