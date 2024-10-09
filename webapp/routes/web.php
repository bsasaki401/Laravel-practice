<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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

Route::get('/index', [PostsController::class, 'index'])->name('index');
Route::get('/create', [PostsController::class, 'showCreate'])->name('show.create');
Route::post('/create', [PostsController::class, 'store'])->name('store');
Route::get('/edit/{id}', [PostsController::class, 'showEdit'])->name('show.edit');
Route::post('/edit/{id}', [PostsController::class, 'registEdit'])->name('regist.edit');
Route::delete('/delete/{id}', [PostsController::class, 'delete'])->name('delete');