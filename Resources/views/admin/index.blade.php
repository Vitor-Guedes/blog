@extends('blog::admin.layout')

@section('title', 'Admin - Home')

@section('content')
    <div class="container mx-auto my-2">
        <div class="conatiner grid mb-5">
            <x-button label="blog::app.btn.new" action="blog.admin.article.create" />
        </div>

        <div class="container grid">
            <x-blog-grid />
        </div>
    </div>
@endsection