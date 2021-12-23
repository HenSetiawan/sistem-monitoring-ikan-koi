<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KolamController;
use App\Http\Controllers\SensorController;

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

Route::get('/sensor/{id}',[SensorController::class,"showSensor"] );
Route::get('/',[KolamController::class,"showTableKolam"]);
Route::get('/delete-kolam/{id}',[KolamController::class,"delete"]);
Route::get('/delete/{id}',[SensorController::class,"delete"]);

Route::get('/form', function () {
    return view('pages/form');
});


