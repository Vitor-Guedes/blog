<?php

namespace Modules\Blog\Services;

use Exception;
use Illuminate\Support\Facades\DB;
use Modules\Blog\Entities\Article;

class ArticleService
{
    public function all() : array
    {
        try {
            $models = Article::all();
            return [
                'success' => true,
                'articles' => $models
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
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
            DB::beginTransaction();

            $model = Article::create($data);

            $this->createTags($model, $data['tags'] ?? '');

            DB::commit();
            return [
                'success' => true,
                'article' => $model
            ]; 
        } catch (Exception $e) {
            DB::rollBack();
            return [
                'success' => false,
                'message' => $e->getMessage()
            ]; 
        }
    }

    public function update(array $data = [], int $id) : array
    {
        try {
            DB::beginTransaction();

            $model = Article::findOrFail($id);
            $model->fill($data)->update();

            $this->createTags($model, $data['tags'] ?? '');
            $this->removeTags($model, $data['remove_tags'] ?? '');

            DB::commit();
            return [
                'success' => true,
                'article' => $model
            ]; 
        } catch (Exception $e) {
            DB::rollBack();
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

    public function getByUrl(string $url)
    {
        try {
            $article = Article::where('url', $url)
                ->where('active', true)
                ->firstOrFail();

            return [
                'success' => true,
                'article' => $article
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function createTags(Article $article, string $tags = '')
    {
        if (!$tags) {
            return ;
        }

        $tags = array_map(function ($tag) {
            return ['code' => $tag];
        }, explode(',', $tags));
        
        $article->tags()->createMany($tags);
    }

    public function removeTags(Article $article, string $tagsId = '')
    {
        if (!$tagsId) {
            return ;
        }

        $_tagIds = explode(',', $tagsId);
        foreach ($_tagIds as $id) {
            $article->tags()->where('id', $id)->delete();
        }
    }

    public function getByIds(array $ids = [])
    {
        try {
            $articles = Article::whereIn('id', $ids)->get();

            return [
                'success' => true,
                'articles' => $articles
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}