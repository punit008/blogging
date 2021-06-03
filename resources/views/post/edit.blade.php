@extends('layouts.app')

@section('head')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endsection

@section('title', 'Edit Posts')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-md-6 mb-4  mt-5">
                <div class="card mx-auto" style="width: 50rem;">
                    <div class="card-header">
                       Edit Post
                    </div>
                    <div class="card-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success text-center col-6 mx-auto">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <form method="post" action="{{ route('post.update', [$post->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-md-6 mb-4">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                                    @error('title')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xl-12 col-md-6 mb-4">
                                    <label for="desc" class="mt-1">Description</label>
                                    <textarea class="summernote" name="content">
                                        {{ $post->content }}
                                    </textarea>
                                    @error('content')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xl-12 col-md-6 mb-4">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.summernote').summernote({
            placeholder: 'Description',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

    </script>

@endsection
