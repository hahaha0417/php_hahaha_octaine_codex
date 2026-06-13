<?php

use hahaha\page\demo\node\hahaha_controller_log_viewer;
use Illuminate\Support\Facades\Route;

Route::prefix('page/demo')->name('page.demo.')->group(function (): void {
    Route::get('/log-viewer', [hahaha_controller_log_viewer::class, 'Index'])->name('log_viewer');
    Route::get('/log-viewer/files', [hahaha_controller_log_viewer::class, 'Files'])->name('log_viewer.files');
    Route::get('/log-viewer/content', [hahaha_controller_log_viewer::class, 'Content'])->name('log_viewer.content');
});
