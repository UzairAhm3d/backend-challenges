<?php

use Illuminate\Support\Facades\Route;
use Src\AppHumanResources\Attendance\Application\ApplicationService;

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
    dd((new ApplicationService())->getAttendance());
    // return view('app');
});
