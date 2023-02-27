@extends('blog::layout.master')

@section('title', 'Blog - Articles')

@section('content')

    <div class="container mt-3">

        <div class="row">

            @include('blog::component.alerts')

        </div>

        <div class="row">

            <div class="col">

                <button id="redirect-to" data-action="{{ route('blog.admin.article.create') }}" type="button" class="btn btn-primary btn-redirect"> Add new Article </button>

            </div>

        </div>

        <div class="row">

            <div class="table-responsivce">

                <table class="table table-sm text-center">

                    <thead>

                        <tr>
                            <td>ID</td>
                            <td>Title</td>
                            <td>Active</td>
                            <td>Actions</td>
                        </tr>

                    </thead>

                    <tbody>
                        
                        @if (isset($collection) && $collection->isEmpty())
                            <tr>

                                <td colspan="4"> No Results </td>

                            </tr>
                        @else

                            @foreach ($collection ?? [] as $article)

                                <tr>

                                    @foreach ($article->getGridColumns() as $column)
                                        
                                        <td>

                                            {{ $article->$column }}

                                        </td>

                                    @endforeach

                                    <td>

                                        <button data-action="{{ route('blog.admin.article.edit', $article->id) }}" type="button" id="{{ $article->id }}" class="btn btn-sm btn-success btn-edit">Edit</button>
                                        <button data-action="{{ route('blog.admin.article.delete', $article->id) }}" type="button" id="{{ $article->id }}" class="btn btn-sm btn-danger btn-delete">Delete</button>

                                    </td>

                                </tr>

                            @endforeach

                        @endif

                    </tbody>

                    </table>

            </div>

        </div>

    </div>

@endsection