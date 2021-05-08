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
    return view('welcome');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/mission', [App\Http\Controllers\MissionController::class, 'index'])->name('mission');
Route::post('mission', 'App\Http\Controllers\MissionController@createMission');
Route::put('mission/{missionKey}', 'App\Http\Controllers\MissionController@missionComplete')->name('missionComplete');
Route::delete('mission/{missionKey}', 'App\Http\Controllers\MissionController@deleteMission')->name('missionDelete');