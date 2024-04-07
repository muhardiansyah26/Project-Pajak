<?php

use App\Models\Dataset;
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

Route::get('/', function () {
    return view('create');
});
// Route::get('/informasi', function () {
//     return view('information');
// });
Route::resource('/dataset', \App\Http\Controllers\DatasetController::class);
Route::get('/pdf/{id}', [\App\Http\Controllers\DatasetController::class, 'print'])->name('print');
Route::get('/search', [\App\Http\Controllers\DatasetController::class, 'search'])->name('search');
