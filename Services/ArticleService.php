<?php

namespace Modules\Blog\Services;

use Exception;
use Modules\Blog\Entities\Article;

class ArticleService
{
    public function all() : array
    {
        try {
            $models = Article::all();
            return [
                'success' => false,
                'articles' => $models
            ];
        } catch (Exception $e) {
            return [
                'success' => true,
                'message' => $e->getMessage()
            ];
        }
    }

    public function get(int $id) : array
    {
        try {
            $model = Article::findOrFail($id);
            return [
                'success' => true,
                'article' => $model
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function store(array $data = []) : array
    {
        try {
            $model = Article::create($data);
            return [
                'success' => true,
                'article' => $model
            ]; 
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ]; 
        }
    }

    public function update(array $data = [], int $id) : array
    {
        try {
            $model = Article::findOrFail($id);
            $model->fill($data)->update();
            return [
                'success' => true,
                'article' => $model
            ]; 
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ]; 
        }
    }

    public function destroy(int $id) : array
    {
        try {
            $model = Article::findOrFail($id);
            $model->delete();
            return [
                'success' => true,
                'article' => $model
            ]; 
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ]; 
        }
    }
}