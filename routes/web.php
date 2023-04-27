<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RanksController;
use App\Http\Controllers\TournamentsController;
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

Route::get('/', [ArticlesController::class, 'index']);
Route::resource('articles', ArticlesController::class)->only(['index', 'show']);
Route::resource('members', MembersController::class)->only(['index', 'show']);
Route::resource('tournaments', TournamentsController::class)->only(['index']);
Route::get('ranks/list', [RanksController::class, 'list']);
Route::get('ranks/month/{year?}/{month?}', [RanksController::class, 'month'])->name('ranks.month');
Route::get('ranks/archive', [RanksController::class, 'archive']);
Route::get('ranks/season/{id}', [RanksController::class, 'season'])->name('ranks.season');
Route::get('contact', [ContactController::class, 'index']);
Route::post('contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('downloads', DocumentsController::class);

Route::get('{slug}', PagesController::class);
