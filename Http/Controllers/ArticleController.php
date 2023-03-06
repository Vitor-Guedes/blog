<?php

namespace Modules\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Blog\Entities\Article;
use Modules\Blog\Services\ArticleService;
use Modules\Blog\Services\TagService;

class ArticleController 
extends Controller
{
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('blog::create');
    }

    public function store(ArticleService $service, Request $request)
    {
        $data = $request->all();
        $result = $service->store($data);

        if ($result['success']) {
            return redirect()
                ->route('admin.index')
                ->with('success', __("Sucesso ao criar artigo"));
        }
        
        session()->flash( 'error', $result['message']);
        return redirect()->back()->withInput();
    }

    public function edit(ArticleService $service, int $id)
    {
        $params = [];

        $result = $service->get($id);
        if ($result['success']) {
            $params = [
                'article' => $result['article']
            ];
        }

        return view('blog::edit', $params);
    }

    public function update(ArticleService $service, Request $request, int $id)
    {
        $data = $request->all();
        $result = $service->update($data, $id);

        if ($result['success']) {
            return redirect()
                ->back()
                ->with('success', __("Sucesso ao atualizar artigo"));
        }
        
        session()->flash( 'error', $result['message']);
        return redirect()->back()->withInput();
    }

    public function destroy(ArticleService $service, int $id)
    {
        $result = $service->destroy($id);

        if ($result['success']) {
            return redirect()
                ->back()
                ->with('success', __("Sucesso ao deleter artigo"));
        }
        
        session()->flash( 'error', $result['message']);
        return redirect()->back()->withInput();
    }

    public function article(ArticleService $service, string $url)
    {
        $result = $service->getByUrl($url);

        if ($result['success']) {
            return view('blog::article.view', [
                'article' => $result['article']
            ]);
        }

        return view('blog::article.not_founded');
    }

    public function catalog(ArticleService $articleService, TagService $tagService, Request $request)
    {
        $articles = $tags = [];

        if ($params = $request->all()) {
            $result = $tagService->getArticleIdsByTagCode($params['tag']);
            if ($result['success']) {
                $result = $articleService->getByIds($result['article_ids']->toArray());
                if ($result['success']) {
                    $articles = $result['articles'];
                }
            }

        } else {
            $result = $articleService->all();

            if ($result['success']) {
                $articles = $result['articles'];
            }

            $result = $tagService->getAllDistinct();
            if ($result['success']) {
                $tags = $result['tags'];
            }
        }

        return view('blog::article.catalog', [
            'articles' => $articles,
            'tags' => $tags
        ]);
    }
}