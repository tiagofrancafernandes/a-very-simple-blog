@extends('layouts.admin')

@section('content')
    <div class="w-100">
        @if (session()->has('success'))
            <div class="alert alert-success py-1 mt-1" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger py-1 mt-1" role="alert">
                {{ session()->get('error') }}
            </div>
        @endif
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <td colspan="4">
                    {{ $posts->links('pagination::bootstrap-4') }}
                </td>
            </tr>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Created at</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at->diffForHumans() }}</td>
                <td>
                    <a href="{{ route('admin.post.show', $post->id) }}" class="btn btn-sm btn-outline-info">Show</a>
                    <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                    <a
                        href="{{ route('admin.post.delete', $post->id) }}"
                        class="btn btn-sm btn-outline-danger"
                        onclick="if (! confirm('You really want to delete the post {{ $post->title }}?')) { return false; }"
                        >Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
