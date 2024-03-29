<?php

use Modules\Blog\Http\Controllers\ArticleController;

Route::prefix('article')->group(function () {
    Route::get('{url}', [ArticleController::class, 'article'])->name('view.article');
});

Route::get('/', [ArticleController::class, 'catalog'])->name('view.catalog');