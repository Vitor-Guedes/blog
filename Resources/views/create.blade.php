@extends('blog::layout.master')

@section('title', 'Blog - Create Article')

@section('content')

    <form action="{{ route('blog.admin.article.store') }}" method="POST">

        @csrf

        <div class="my-2">

            <button id="redirect-to" data-action="{{ route('admin.index') }}" type="button" class="btn btn-primary btn-redirect">Back</button>
            
            <button type="submit" class="btn btn-success"> Save </button>

        </div>

        <div class="row my-2">

            @include('blog::component.alerts')
        
        </div>

        <div class="mt-2 mx-auto row">

            <div class="mb-3 row col-10">
                
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                
                <div class="col-sm-10">
                    
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">

                </div>

            </div>

            <div class="col-2">
                
                <div class="form-check">
                
                    <input class="form-check-input" type="checkbox" id="active" name="active" {{ old('active') ? checked : '' }}>
                    
                    <label class="form-check-label" for="active">Ative</label>
                
                </div>
                
            </div>

            </div>

            <div class="row mx-auto">

            <div class="mb-3">

                <label for="content" class="form-label">Content</label>
                
                <textarea class="form-control" id="content" rows="3" name="content">{{ old('content') }}</textarea>

            </div>

        </div>

    </form>

@endsection

@section('js')
    <script src="{{ asset('js/checkbox-input.js') }}"></script>
@endsection