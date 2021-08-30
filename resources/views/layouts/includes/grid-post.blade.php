<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($posts as $post)
            <div class="col">
                <div class="card shadow-sm">
                    <a href="{{ route('post.show', $post->id) }}">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef"
                            dy=".3em">Thumbnail</text>
                    </svg>
                    </a>

                    <div class="card-body">
                        <h6>{{ $post->title }}</h6>
                        <div class="card-text">
                            {!! strip_tags(html_entity_decode(\Str::limit($post->content, 160, $end='...'))) !!}
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                <a href="#like" class="btn btn-sm btn-outline-secondary">Like</a>
                            </div>
                            <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-12 py-2 my-3 d-flex justify-content-center">
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
