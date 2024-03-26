<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        $user = $user->load('posts');
        return view('users.profile', compact('user'));
    }
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    public function update(User $user,UpdateRequest $updateRequest)
    {
        $updateRequest->update($user);
        return redirect(route('username',['user'=>$updateRequest->get('username')]))->with('success', __('Your profile has been updated'));
    }
}
