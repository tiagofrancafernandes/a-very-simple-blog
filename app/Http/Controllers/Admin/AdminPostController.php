<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->paginate(10);

        return view('admin.posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|min:5|max:100',
            'content'   => 'required|min:160',
        ]);

        $post = Post::create([
            'title'     => $request->input('title'),
            'content'   => htmlentities($request->input('content')),
        ]);

        if(!$post)
            return redirect()->route('post.index')->with('error', 'Fail to create the post');

        return redirect()->route('admin.post.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post_id)
    {
        $post = Post::find($post_id);

        if(!$post)
            return redirect()->route('admin.post.index')->with('error', 'Post not found');

        return view('admin.posts.post', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id)
    {
        $post = Post::find($post_id);

        if(!$post)
            return redirect()->route('admin.post.index')->with('error', 'Post not found');

        return view('admin.posts.form', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post_id)
    {
        $post = Post::find($post_id);

        if(!$post)
            return redirect()->route('admin.post.index')->with('error', 'Post not found');

        $request->validate([
            'title'     => 'required|min:5|max:100',
            'content'   => 'required|min:160',
        ]);

        $post_updated = $post->update([
            'title'     => $request->input('title'),
            'content'   => htmlentities($request->input('content')),
        ]);

        if(!$post_updated)
            return redirect()->route('post.index')->with('error', 'Fail to update the post');

        return redirect()->route('admin.post.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id)
    {
        $post = Post::find($post_id);

        if(!$post)
            return redirect()->route('admin.post.index')->with('error', 'Post not found');

        $post_deleted = $post->delete();

        if(!$post_deleted)
            return redirect()->route('post.index')->with('error', 'Fail to delete the post');

        return redirect()->route('admin.post.index')->with('success', 'Post deleted successfully');
    }

    public static function routes()
    {
        Route::prefix('posts')->group(function () {
            Route::get('/',                 [AdminPostController::class, 'index'])->name('admin.post.index');
            Route::get('/create',           [AdminPostController::class, 'create'])->name('admin.post.create');
            Route::post('/store/',          [AdminPostController::class, 'store'])->name('admin.post.store');
            Route::get('/edit/{post_id}',   [AdminPostController::class, 'edit'])->name('admin.post.edit');
            Route::post('/update/{post_id}',[AdminPostController::class, 'update'])->name('admin.post.update');
            Route::get('/show/{post_id}',   [AdminPostController::class, 'show'])->name('admin.post.show');
            Route::get('/delete/{post_id}', [AdminPostController::class, 'destroy'])->name('admin.post.delete');
        });
    }
}
