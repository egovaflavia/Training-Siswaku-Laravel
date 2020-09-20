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


// Halaman Rahasia
Route::get('halaman-rahasia', [
    'as' => 'secret',
    'uses' => 'RahasiaController@halamanRahasia'
]);

Route::get('showmesecret', 'RahasiaController@showMeSecret');

// Siswa
Route::get('/siswa', 'SiswaController@index');
Route::get('siswa/create', 'SiswaController@create');
Route::get('siswa/{id}', 'SiswaController@show');
Route::post('siswa', 'SiswaController@store');
Route::get('siswa/{id}/edit', 'SiswaController@edit');
Route::patch('siswa/{id}', 'SiswaController@update');
Route::delete('siswa/{id}', 'SiswaController@destroy');
Route::get('sampledata', function () {
    DB::table('siswa')->insert([
        [
            'nisn' => '1001',
            'nama_siswa' => 'Egova',
            'tanggal_lahir' => '1990-02-11',
            'jenis_kelamin' => 'L',
            'created_at' => '2020-03-10 19:10:15',
            'updated_at' => '2020-03-10 19:10:15'
        ],
    ]);
});

// Eloquent: Collection
Route::get('tes-collection', 'SiswaController@tesCollection');

// Date mutator
Route::get('date-mutator', 'SiswaController@dateMutator');
