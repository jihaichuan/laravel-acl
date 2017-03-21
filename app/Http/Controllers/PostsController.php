<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function show($id)
    {
        $post = Post::findOrFail($id);

        // 第一种方法
        \Auth::loginUsingId(3);
        if (Gate::denies('show-post', $post)) {
            abort(403, '无权访问');
        }

        // 第二种方法
//        $this->authorize('show-post', $post);


        return $post->title;
    }

}
