<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Post ;


class PostController extends Controller
{
    public function index()
    {
        return  PostResource::collection(Post::paginate(2));
    }

    public function show($post)
    { 
      return new PostResource(Post::find($post));    
    }

    public function store(Request $request)
    {
        $post=new Post;
        $post->title = $request->input('title');
        $post->description  = $request->input('description');
        $post->user_id = $request->input('userId');

        if($post->save())
        {
            return new PostResource($post);
        }
    }
}
