<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\AdminController;

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

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);
// 上記は誰でも操作可能

Route::middleware('auth')->group(function () {
    Route::get('/admin', [SearchController::class, 'index']);
    Route::post('/search', [SearchController::class, 'search']);
});

