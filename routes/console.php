<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('log', function () {
    Log::info('this is a test');
})->purpose('Writes a log');

Artisan::command('sendEmail', function () {
    Mail::send(new MailExample());
})->purpose('Sends an Email');