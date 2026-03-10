<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('files', FileController::class);
    Route::get('/download/{id}', [FileController::class, 'download'])->name('files.download');
});
