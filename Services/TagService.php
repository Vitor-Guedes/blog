<?php

namespace Modules\Blog\Services;

use Exception;
use Illuminate\Support\Facades\DB;
use Modules\Blog\Entities\Tag;

class TagService
{
    public function getAllDistinct()
    {
        try {
            $tags = Tag::query()
                ->select(['code'])
                ->distinct()
                ->get();

            return [
                'success' => true,
                'tags' => $tags
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getArticleIdsByTagCode(string $code)
    {
        try {
            $articleIds = Tag::where('code', 'like', $code)->get();
            $articleIds = $articleIds->map(function ($tag) {
                return $tag->article_id;
            });
            return [
                'success' => true,
                'article_ids' => $articleIds
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}