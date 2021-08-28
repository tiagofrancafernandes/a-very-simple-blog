@extends('layouts.admin')

@section('content')
    <table class="table table-striped">
        <tbody>
            <tr> <td colspan="5" class="d-none"></td></tr>
            <tr>
                <td colspan="5">
                    <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                    <a
                        href="{{ route('admin.post.delete', $post->id) }}"
                        class="btn btn-sm btn-outline-danger"
                        onclick="if (! confirm('You really want to delete the post {{ $post->title }}?')) { return false; }"
                        >Delete</a>
                </td>
            </tr>
            <tr>
                <th colspan="5" scope="row">Info</th>
            </tr>
            <tr>
                <td><strong>ID:</strong> {{ $post->id }}</td>
                <td><strong>Author:</strong> <a href="#!">John</a></td>
                <td><strong>Created at:</strong> {{ $post->created_at }}</td>
                <td><strong>Last update:</strong> {{ $post->updated_at }}</td>
                <td><strong>Published:</strong> yes</td>
            </tr>
            <tr>
                <th colspan="5" scope="row">{{ $post->title }}</th>
            </tr>
            <tr>
                <td colspan="5">Jacob</td>
            </tr>
            <tr>
                <th colspan="5" scope="row">Content</th>
            </tr>
            <tr>
                <td colspan="5" class="pt-4">
                    {!! html_entity_decode($post->content) !!}
                </td>
            </tr>
        </tbody>
    </table>
@endsection
