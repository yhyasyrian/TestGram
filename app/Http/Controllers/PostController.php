<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreateRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('owner')->withCount('comments')->get();
        $suggestd_users = DB::table('users')
            ->where('id', '!=', auth()->id())
            ->limit(5)
            ->orderBy(DB::raw('RAND()'))
            ->select(['username', 'name', 'image'])
            ->get();
        return view('posts.index', compact('posts', 'suggestd_users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $request->savePost();
        return back()->with('success', __('success create post'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Post $post)
    {
        $request->saveUpdatePost($post);
        return back()->with('success', __('Done update post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    public function explorer()
    {
        $explorer = Post::whereRelation('owner','is_private',false)
            ->paginate(12);
        return view('explorer',compact('explorer'));
    }
}
