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
Route::get('/gallery', [App\Http\Controllers\IndexController::class, 'gallery']);

Route::post('/insert_room', [App\Http\Controllers\IndexController::class, 'insert_room']);
Route::get('pay-success_{id}', [App\Http\Controllers\IndexController::class,'success']);

Route::get('/book-room-{id}', [App\Http\Controllers\IndexController::class, 'bookrooms']);
Route::post('/check-rooms', [App\Http\Controllers\IndexController::class, 'checkroom']);
Route::post('/bookrooms', [App\Http\Controllers\IndexController::class, 'roombook']);

Route::get('/near-places', [App\Http\Controllers\IndexController::class, 'blog']);

Route::get('/rooms', [App\Http\Controllers\IndexController::class, 'rooms'])->name('rooms');

Route::get('/view-room-{id}', [App\Http\Controllers\IndexController::class, 'viewrooms']);
Route::get('/view-nearplaces-{id}', [App\Http\Controllers\IndexController::class, 'viewblog']);

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/index', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/about', [App\Http\Controllers\IndexController::class, 'about'])->name('about');

Route::post('/insert_testo', [App\Http\Controllers\IndexController::class, 'insert_testo']);
Route::post('/insert_contact', [App\Http\Controllers\IndexController::class, 'insert_contact']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/amenties', function () {
    return view('facilities');
});

Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
