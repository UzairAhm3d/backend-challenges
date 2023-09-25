<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Challenge;

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

// Challenge 2 (Get Dublicates)
Route::get('/get-dublicate', [Challenge::class, 'dublicate']);

// Challenge 4 (groupByOwnersService)
Route::get('/group-by-owener-services', [Challenge::class, 'groupBy']);
