<?php

use Modules\Blog\Http\Controllers\AdminController;

$controller = AdminController::class;

Route::get('', [$controller, 'index']);

Route::prefix('article')->group(function () use ($controller) {
    
    Route::get('create', [$controller, 'create'])->name('blog.admin.article.create');

    Route::post('store', [$controller, 'store'])->name('blog.admin.article.store');

    Route::get('edit/{id}', [$controller, 'index'])->name('blog.admin.article.edit');
});
