<?php

use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard', [
            'articleCount' => Article::query()->count(),
            'categoryCount' => Category::query()->count(),
            'tagCount' => Tag::query()->count(),
            'commentCount' => ArticleComment::query()->count(),
        ]);
    })->name('dashboard');
});

require __DIR__ . '/settings.php';
