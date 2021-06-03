@extends('layouts.app')

@section('title', 'Blogging')


@section('content')

    <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-danger text-center col-6 mx-auto mt-3">
                {{ Session::get('message') }}
            </div>
        @endif
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Author</th>
                    <th scope="col">View</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>

                @if ($posts->count())

                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{!! Str::words($post->content, 50) !!} <a
                                    href="{{ route('blog', ['post' => $post->id]) }}" class="text-primary">Read more</a>
                            </td>
                            <td>{{ $post->users['name'] }}</td>
                            <td><a href="{{ route('post.show', ['post' => $post->id]) }}" class="btn btn-primary">View</a>
                            </td>
                            <td>
                                <form action="{{ route('post.delete', [$post->id]) }}" method="post">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                @else
                    <tr>
                        <td colspan="4">No Record Found</td>
                    </tr>
                @endif


            </tbody>
        </table>
        <div class="text-center">
            {{ $posts->links() }}
        </div>
    </div>

@endsection
