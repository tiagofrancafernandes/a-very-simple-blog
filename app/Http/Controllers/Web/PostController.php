<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::orderBy('updated_at', 'desc')->paginate(9);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Request $request, $post_id)
    {
        $post = Post::find($post_id);

        if(!$post)
            return redirect()->route('post.index')->with('error', 'Post not found');

        return view('posts.post', [
            'post' => $post,
        ]);
    }

    public static function routes()
    {
        Route::get('/',                 [PostController::class, 'index'])->name('post.index');
        Route::get('/post/{post_id}',   [PostController::class, 'show'])->name('post.show');
    }
}
