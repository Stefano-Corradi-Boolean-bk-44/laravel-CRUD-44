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

Route::get('/', 'PageController@index')->name('home');
Route::get('/contacts', 'PageController@contacts')->name('contacts');

// rotta di esempio su come si passano i parametri in GET
Route::get('/saluto/{nome}/{cognome}', 'PageController@saluto')->name('saluto');



// Con resouece() laravel crea tutto le URI delle CRUD
// Resource Route
Route::resource('pastas','PastaController');


