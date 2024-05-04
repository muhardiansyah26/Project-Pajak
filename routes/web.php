<?php

use App\Models\Dataset;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatasetController;

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
    return redirect()->route('dataset.create');
});
Route::resource('/dataset', \App\Http\Controllers\DatasetController::class);
Route::get('/pdf/{id}', [\App\Http\Controllers\DatasetController::class, 'print'])->name('print');
Route::get('/search', [\App\Http\Controllers\DatasetController::class, 'search'])->name('search');

Route::get('typehead-autocomplete', [DatasetController::class, 'index']);
Route::get('search-auto-db', [DatasetController::class, 'searchQuery']);

Route::get('/coba', [\App\Http\Controllers\DatasetController::class, 'coba'])->name('coba');
// Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
// Route::get('actionlogout', [\App\Http\Controllers\LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
