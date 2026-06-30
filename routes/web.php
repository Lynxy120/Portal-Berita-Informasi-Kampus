<?php

use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

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

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    // Categories
    Route::get('/categories', \App\Livewire\Admin\Category\Index::class)->name('categories.index');
    Route::get('/categories/create', \App\Livewire\Admin\Category\Create::class)->name('categories.create');
    Route::get('/categories/{category}/edit', \App\Livewire\Admin\Category\Edit::class)->name('categories.edit');

    // Tags
    Route::get('/tags', \App\Livewire\Admin\Tag\Index::class)->name('tags.index');
    Route::get('/tags/create', \App\Livewire\Admin\Tag\Create::class)->name('tags.create');
    Route::get('/tags/{tag}/edit', \App\Livewire\Admin\Tag\Edit::class)->name('tags.edit');
});

require __DIR__ . '/settings.php';
