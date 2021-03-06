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
})->name('welcome');

Route::post('/draft', 'CardController@index')->name('cards.draft')->middleware('checkGameEnded');
Route::get('/cards', 'CardController@index')->name('cards.index')->middleware('checkCard');
Route::get('/cards/create', 'CardController@create')->name('cards.create');
Route::post('/cards', 'CardController@store')->name('cards.store');