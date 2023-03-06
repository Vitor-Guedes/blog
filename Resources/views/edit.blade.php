@extends('blog::layout.master')

@section('title', 'Blog - Create Article')

@section('content')

    @if (isset($article)) 

        <form action="{{ route('blog.admin.article.update', $article->id) }}" method="POST">

            @csrf

            <input type="hidden" name="id" id="id" value="{{ $article->id }}">

            <div class="mt-2 mx-auto">

                <button id="redirect-to" data-action="{{ route('admin.index') }}" type="button" class="btn btn-primary btn-redirect">Back</button>
                
                <button type="submit" class="btn btn-success">Update</button>

            </div>

            <div class="row my-2">

                @include('blog::component.alerts')
            
            </div>

            <div class="mt-2 mx-auto row">

                <div class="mb-3 row col-5">
                    
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    
                    <div class="col-sm-10">
                        
                        <input type="text" class="form-control" id="title" name="title" value="{{ $article->title ?? old('title') ?? '' }}">

                    </div>

                </div>

                <div class="mb-3 row col-5">
                    
                    <label for="url" class="col-sm-2 col-form-label">Url</label>
                    
                    <div class="col-sm-10">
                        
                        <input type="text" class="form-control" id="url" name="url" value="{{ $article->url ?? old('url') ?? '' }}">

                    </div>

                </div>

                <div class="col-2">
                    
                    <div class="form-check">

                        <input class="form-check-input" type="checkbox" id="active" name="active" value="{{ $article->active ? 1 : old('active') ? 1 : 0 }}" {{ $article->active ? 'checked' : old('active') ? 'checked' : '' }}>
                        
                        <label class="form-check-label" for="active">Ative</label>
                    
                    </div>

                    <input class="form-check-input" type="hidden" id="active" name="active" value="0" {{ $article->active ? 'disabled' : old('active') ? 'disabled' : '' }}>
                    
                </div>

                </div>

                <div class="row mx-auto">

                <div class="mb-3">

                    <label for="content" class="form-label">Content</label>
                    
                    <textarea class="form-control" id="content" rows="3" name="content">{{ $article->content ?? old('content') ?? '' }}</textarea>

                </div>

            </div>

            <hr class="divider">

            <div class="row mx-auto">

                <div class="mb-3">

                    <div class="container mb-2" id="container-tags">

                        @if ($tags = $article->tags)

                            @foreach ($tags as $tag)

                                <span class="badge bg-secondary mx-1"> 
                                
                                    {{ $tag->code }}
                                    
                                    <span role="button" id="{{ $tag->id }}" class="text-white remove_tag">x</span>
                                
                                </span>

                            @endforeach

                        @endif

                    </div>

                    <label for="input_tag" class="form-label">Tags</label>

                    <input type="hidden" name="tags" id="tags">

                    <input type="hidden" name="remove_tags" id="remove_tags">

                    <input type="text" class="form-control" id="input_tag" data-target="tags" data-container="container-tags">

                </div>

            </div>

        </form>

    @endif

@endsection

@section('js')
    <script>
        var inputTag = 'input_tag';
        var removeTag = '.remove_tag';
    </script>
    <script src="{{ asset('js/checkbox-input.js') }}"></script>
@endsection