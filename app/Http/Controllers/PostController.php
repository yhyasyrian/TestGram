<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreateRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //  it's bas if i use relationship with likes tables, in this case i will use (count post) query for check if user liked or no
        // $posts = Post::with('owner')->withCount('comments')->with('likes')->get();
        $posts = DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->leftJoin('comments', 'comments.post_id', '=', 'posts.id')
        ->leftJoin('likes', function (JoinClause $joinClause) {
            $joinClause->on('posts.id', '=', 'likes.post_id')->where('likes.user_id', '=', Auth::id());
        })
        ->groupBy('posts.id')
        ->orderBy('posts.created_at', 'desc')
        ->select($this->arraySelectsTablePost())
        ->get()
        ;
        $suggestd_users = DB::table('users')
            ->where('id', '!=', auth()->id())
            ->limit(5)
            ->orderBy(DB::raw('RAND()'))
            ->select(['username', 'name', 'image'])
            ->get();
        return view('posts.index', compact('posts', 'suggestd_users'));
    }
    private function arraySelectsTablePost():array
    {
        $result = ['posts.id','posts.image','posts.slug','posts.description','posts.created_at'];
        $result[] = DB::raw("users.username as owner_username");
        $result[] = DB::raw("users.image as owner_image");
        $result[] = DB::raw("likes.user_id as user_like");
        $result[] = DB::raw("COUNT(`comments`.`id`) as `comments_count`");
        return $result;
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
