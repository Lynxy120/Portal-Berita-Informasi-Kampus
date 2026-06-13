<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::get('/admin-test', function () {
    return 'Admin Area';
})->middleware(['auth', 'role:admin']);

Route::get('/editor-test', function () {
    return 'Editor Area';
})->middleware(['auth', 'role:admin,editor']);

require __DIR__ . '/settings.php';
