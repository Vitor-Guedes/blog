@extends('blog::admin.layout')

@section('title', 'Admin - Home')

@section('content')
    <div class="container mx-auto my-2">
        <div class="conatiner grid mb-5">
            <h4>{{ __('blog::app.article.create') }}</h4>
        </div>

        <div class="container grid">
            <x-form />
        </div>
    </div>
@endsection