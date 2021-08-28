@extends('layouts.admin')

@section('content')
    @php
        $action_type = $post->id ?? null ? 'Edit' : 'Create';
        $action      = $action_type == 'Edit' ? route('admin.post.update', $post->id) : route('admin.post.store');
    @endphp
    <div class="mb-3">
        <h5>{{ $action_type }} post</h5>
    </div>

    <form class="row" action="{{ $action }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Post title <strong class="text-danger">*</strong></label>
            <input type="text" class="form-control" id="title" value="{{ old('title') ?? $post->title ?? '' }}" name="title" placeholder="Post title" required>
            @error('title')
                <div class="alert alert-danger py-1 mt-1" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Post content <strong class="text-danger">*</strong></label>
            <textarea
                class="form-control" id="content" name="content" rows="5" placeholder="Post content"
                >{!! html_entity_decode(old('content') ?? $post->content ?? '') !!}</textarea>
                @error('content')
                    <div class="alert alert-danger py-1 mt-1" role="alert">
                        {{ $message }}
                    </div>
                @enderror
        </div>

        <div class="mb-3">
            <a href="{{ route('admin.post.index') }}" type="submit" class="btn btn-sm btn-danger">Cancel</a>
            <button type="submit" class="btn btn-sm btn-success">{{ $action_type == 'Edit' ? 'Update' : $action_type }}</button>
        </div>
    </form>
@endsection
