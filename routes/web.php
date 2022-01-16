<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailTest;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/mail', function(){
    $mail_text = "メールテスト";
    Mail::to('to_address@example.com')->send(new MailTest($mail_text));
});

Route::get('/hello', '\App\Http\Controllers\HelloController@index')->name('hello');
Route::post('/hello', '\App\Http\Controllers\HelloController@send')->name('hello_send');
Route::get('/hello/{id}/{name}', '\App\Http\Controllers\HelloController@save')->name('hello_save');


Route::get('/hello/json', '\App\Http\Controllers\HelloController@json');
Route::get('/hello/json/{id}', '\App\Http\Controllers\HelloController@json');

Route::get('/upload', '\App\Http\Controllers\HelloController@upload');

Route::post('/upload', '\App\Http\Controllers\HelloController@upload');
