@extends('layouts.app')

@section('title', 'Blogging')


@section('content')

    <div class="container">
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Author</th>
                </tr>
            </thead>
            <tbody>

                @if ($posts->count())

                    @foreach ($posts as $post)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->content }}</td>
                      <td>{{ $post->users['name'] }}</td>
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
