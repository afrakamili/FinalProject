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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('pertanyaan', 'PertanyaanController')->middleware('auth');
Route::get('/jawaban/{id_pertanyaan}', 'JawabanController@index')->middleware('auth');
Route::post('/jawaban', 'JawabanController@store');
Route::post('/komentarjawaban/create', 'KomentarJawabanController@store');
Route::resource('komentarjawaban','KomentarJawabanController')->middleware('auth');

//Route::get('/listjawaban/{id_pertanyaan}', 'JawabanController@index');
//Route Coba FrontEND FInal Project
// Route::get('/', function (){
//     return view('page.daftarpertanyaan');
// });

// Route::get('/create', function (){
//     return view('page.buatpertanyaan');
// });

// Route::get('/jawab', function (){
//     return view('page.tanyajawab');
// });

Route::get('/editpertanyaan', function (){
    return view('page.editpertanyaan');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });