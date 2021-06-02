@extends('layouts.app')

@section('head')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endsection

@section('title', 'Add Posts')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-md-6 mb-4  mt-5">
                <div class="card mx-auto" style="width: 50rem;">
                    <div class="card-header">
                        Post
                    </div>
                    <div class="card-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success text-center col-6 mx-auto">
                                {{ Session::get('message') }}
                            </div>php artisan migrate:refresh
                        @endif
                        <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-md-6 mb-4">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title">
                                </div>
                                <div class="col-xl-12 col-md-6 mb-4">
                                    <label for="desc" class="mt-1">Description</label>
                                    {{-- <div id="summernote"></div> --}}
                                    <textarea class="summernote" name="content" id="summernote"></textarea>
                                </div>
                                <input type="hidden" class="form-control" name="author_id" value="2">
                                <div class="col-xl-12 col-md-6 mb-4">
                                    <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        $('#summernote').summernote({
            placeholder: 'Description',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

    </script>

@endsection
