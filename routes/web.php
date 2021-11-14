<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\QueueController;


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

Route::get('/', [IndexController::class, 'index']);
Route::get('/job', [QueueController::class, 'index']);

Route::get('/queue', [QueueController::class, 'form']);
Route::get('/post-data{first_name?}/{last_name?}', [QueueController::class, 'form'])->name('queue/form');