<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',[AdController::class, 'index'])->name('welcome');
Route::get('/single-ad/{id}',[AdController::class, 'singleAd'])->name('singleAd');
Route::post('/single-ad/{id}/send-message',[AdController::class, 'sendMessage'])->name('sendMessage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/add-deposit', [App\Http\Controllers\HomeController::class, 'addDeposit'])->name('home.AddDeposit');
Route::get('/home/add-ad', [App\Http\Controllers\HomeController::class, 'addAd'])->name('home.addAd');
Route::get('/home/ad/{id}', [App\Http\Controllers\HomeController::class, 'showSingleAd'])->name('home.singleAd'); 
Route::get('/home/show-messages',[HomeController::class, 'showMessages'])->name('home.showMessages');
Route::get('/home/messages/reply',[HomeController::class, 'reply'])->name('home.reply');
Route::post('/home/message/reply',[HomeController::class, 'replyStore'])->name('home.replyStore');

Route::post('/home/add-deposit', [App\Http\Controllers\HomeController::class, 'newDeposit'])->name('home.AddDeposit');
Route::post('/home/add-ad', [App\Http\Controllers\HomeController::class, 'showAd'])->name('home.addAd');


