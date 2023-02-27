@extends('blog::layout.master')

@section('title', '')

@section('content')

    <div class="container mx-auto">
       
        <div class="row">

            <h1>

                {{ $article->title }}

            </h1>

        </div>

        <div class="container">

            {!! $article->content !!}

        </div>
    
    </div>

@endsection