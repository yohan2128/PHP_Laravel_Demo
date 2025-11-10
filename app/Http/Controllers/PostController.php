<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $inreq = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $inreq['title'] = strip_tags($inreq['title']);
        $inreq['body'] = strip_tags($inreq['body']);
        $inreq['user_id'] = auth()->guard()->id();

        Post::create($inreq);

        return redirect('/home');
    }

    public function showEditPost(Post $post)
    {
        if (is_null(auth()->user()) || auth()->user()->id !== $post['user_id']) {
            return redirect('/home');
        }
        return view('edit-post', ['post' => $post]);
    }

    public function cancelEdit()
    {
        return redirect('/home');
    }

    public function editPost(Post $post, Request $request)
    {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/home');
        }

        $inreq = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $inreq['title'] = strip_tags($inreq['title']);
        $inreq['body'] = strip_tags($inreq['body']);

        $post->update($inreq);

        return redirect('/home');
    }

    public function deletePost(Post $post)
    {
        if (auth()->user()->id === $post['user_id']) {
            $post->delete();
        }
        return redirect('/home');
    }
}
