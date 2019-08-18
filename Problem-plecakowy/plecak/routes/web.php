<?php
use App\Adres;
use App\Auto;
use App\Kurier;
use App\Paczka;
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

Route::get('/', function () 
{
    $auto = Auto::all();
    $kurier = Kurier::all();
    return view('welcome')->with('auto', $auto)->with('kurier', $kurier);
})->name('welcome');
Route::get('/result', 'PlecakController@showResult')->name('result');
Route::post('/calc', 'PlecakController@algorithm')->name('calc');

