<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post ;
use App\User;

class PostController extends Controller
{
    public function index()
    {    $posts=Post::all();
        return view('posts.index',[
           'posts' => $posts,
        ]);
    }

    public function show()
    {
        $request=request();
        $postId=$request->post;
        $post=Post::find($postId);
        return view('posts.show',[
            'post' => $post,
        ]);
    }

    public function create(){
        $users=User::all();
        return view('posts.create',[
            'users'=> $users,
        ]);
    }

    public function store()
    {
        $request=request();
       
        Post::create([
            'title' => $request->title,
            'description' =>  $request->description,
            'user_id' =>  $request->user_id,
        ]);
        return redirect()->route('posts.index');
    }

    public function edit()
    {
        $request=request();
        $postId=$request->post;
        $post=Post::find($postId);
        $users=User::all();
        return view('posts.edit',[
            'post' => $post,
            'users'=> $users,
        ]);
    }

    public function update()
    {
        $request=request();
        $postId=$request->post;
        Post::where('id',$postId)->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' =>  $request->user_id,
        ]);
        return redirect()->route('posts.index');
    }

    public function destroy()
    {
        $postId=request()->post;
        Post::where('id',$postId)->delete();
        return redirect()->route('posts.index');
    }
}
