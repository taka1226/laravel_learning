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

Route::get('/hello/', 'App\Http\Controllers\HelloController@index')->name('hello1');
Route::get('/hello/{id}', 'App\Http\Controllers\HelloController@index')->name('hello');
