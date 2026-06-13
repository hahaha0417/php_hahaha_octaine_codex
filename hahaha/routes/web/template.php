<?php

use hahaha\template\page\demo\hahaha_controller_multiple;
use hahaha\template\page\demo\hahaha_controller_one;
use Illuminate\Support\Facades\Route;

Route::prefix('template/page/demo')->name('template.page.demo.')->group(function (): void {
    Route::get('/one', [hahaha_controller_one::class, 'Index'])->name('one');
    Route::get('/multiple', [hahaha_controller_multiple::class, 'Index'])->name('multiple');
});
