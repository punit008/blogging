@extends('layouts.app')

@section('title', 'Login')


@section('head')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endsection

@section('content')

    <div class="container">


        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-md-6 mb-4  mt-5">
                    <div class="card mx-auto" style="width: 50rem;">
                        <div class="card-header">
                            Login
                        </div>
                        <div class="card-body">
                            @if (Session::has('status'))
                                <div class="alert alert-success text-center col-6 mx-auto">
                                    {{ Session::get('status') }}
                                </div>
                            @endif
                            <form method="post" action="{{ route('auth.login.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12 col-md-6 mb-4">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email">
                                        @error('email')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-12 col-md-6 mb-4">
                                        <label for="password">password</label>
                                        <input type="password" class="form-control" name="password">
                                        @error('password')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror

                                    </div>
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




    </div>

@endsection
