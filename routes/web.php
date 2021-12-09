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

Route::get('/', function () {
    $data=[12,16,15,67,34,78];
    return view('pages/blank',["data" => $data]);
});

Route::get('/proses', function () {
    $data=[12,16,15,67,34,78];
    return view('pages/proses');
});
