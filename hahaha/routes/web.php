<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    Log::channel('log_error')->info('Hello World');

    return view('welcome');
});
