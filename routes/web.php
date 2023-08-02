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

Auth::routes();

Route::resource('administrators', App\Http\Controllers\UserController::class);
Route::resource('employees', App\Http\Controllers\EmployeeController::class);
Route::get('read-banxico', 'App\Http\Controllers\BanxicoController@index')->name('read_banxico');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');