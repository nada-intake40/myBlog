@extends('layouts.app')

@section('content')

<div class="container-fluid ">
    <div class="row justify-content-center mb-5">
        <a href="{{route('posts.create')}}" class="btn btn-success btn-lg">Create Post</a> 
    </div>
    <div class="row justify-content-center mx-5">
        <table class="table">
        <thead>
            <tr class="font-weight-bolder">
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
            <th scope="row">{{$post->title}}</th>
            <td>{{$post->user ? $post->user->name : 'not exist'}}</td>
            <td>{{$post->created_at->toDateString()}}</td>
            <td><div class="row">
                <a href="{{route('posts.show',['post'=>$post->id])}}" class="btn btn-info btn-md mr-3">View</a>
                <a href="{{route('posts.edit',['post'=>$post->id])}}" class="btn btn-primary btn-md">Edit</a>
               <div class="col-2"> <form method="POST" action="{{route('posts.destroy',['post'=>$post->id])}}">
                   @csrf 
                   @method('DELETE')
                 <button class="btn btn-danger btn-md" type="submit" onclick="return confirm('Are you sure you want to delete this Post?');">Delete</button>
                </form></div>
                </div>   
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>   
</div>

@endsection