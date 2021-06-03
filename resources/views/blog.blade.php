@extends('layouts.app')


@section('title', 'Blog Posts')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-md-6 mb-4  mt-5">
                <div class="card mx-auto" style="width: 50rem;">
                    <div class="card-header text-capitalize">
                        {{ $post->title }}
                    </div>
                    <div class="card-body">
                       <h4 class="text-primary">Author</h4>
                        {{ $post->user_post }}
                       <h4 class="text-primary">Description</h4>
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
