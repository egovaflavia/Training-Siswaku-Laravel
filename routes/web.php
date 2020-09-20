<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'PagesController@homepage');

Route::get('about', 'PagesController@about');

// Siswa
Route::get('/siswa', 'SiswaController@index');

// Halaman Rahasia
Route::get('halaman-rahasia', [
    'as' => 'secret',
    'uses' => 'RahasiaController@halamanRahasia'
]);

Route::get('showmesecret', 'RahasiaController@showMeSecret');
