<?php

use Illuminate\Support\Facades\Route;
use App\Mail\MailExample;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    Mail::to('ofirkatz94@gmail.com')->send(new MailExample());
    return view('welcome');
});
