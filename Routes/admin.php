<?php

use Modules\Blog\Http\Controllers\AdminController;
use Modules\Blog\Http\Controllers\ArticleController;

$controller = AdminController::class;

Route::get('', [$controller, 'index'])->name('admin.index');

Route::prefix('article')->group(function () {
    
    $controller = ArticleController::class;

    Route::get('create', [$controller, 'create'])->name('blog.admin.article.create');

    Route::post('store', [$controller, 'store'])->name('blog.admin.article.store');

    Route::get('edit/{id}', [$controller, 'edit'])->name('blog.admin.article.edit');
    
    Route::post('update/{id}', [$controller, 'update'])->name('blog.admin.article.update');

    Route::get('delete/{id}', [$controller, 'destroy'])->name('blog.admin.article.delete');
});
