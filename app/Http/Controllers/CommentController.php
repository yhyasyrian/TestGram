<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\CreateRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CreateRequest $request,Post $post)
    {
        $request->saveComment($post);
        return back()->with('success','done create comment');
    }
}
