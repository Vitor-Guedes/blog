@extends('blog::layout.master')

@section('title', 'Article - Catalog')

@section('content')

    @if (isset($tags))

        <div class="row">
            
            <div class="col py-2">

                @foreach ($tags as $tag) 

                    <a href="{{ route('view.catalog') . '?tag=' . $tag->code }}" class="btn btn-sm btn-success"> {{ $tag->code }} </a>

                @endforeach

            </div>

        </div>
    
    @endif

    @if (isset($articles)) 

        <div class="row">
            
            @foreach ($articles as $article)

                <div class="card" style="width: 18rem;">

                    <div class="card-body">

                        <a href="{{ route('view.article', $article->url) }}" class="btn btn-sm btn-primary"><h5 class="card-title"> {{ $article->title }} </h5></a>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

@endsection