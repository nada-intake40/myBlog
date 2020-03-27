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
            <th scope="col"><strong>Id</strong></th>
            <th scope="col"><strong> Title</strong></th>
            <th scope="col"><strong> Slug</strong></th>
            <th scope="col"><strong> Posted By</strong></th>
            <th scope="col"><strong> Created At</strong></th>
            <th scope="col"><strong> Actions</strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
            <td>{{$post->id}}</td>    
            <td>{{$post->title}}</td>
            <td>{{$post->slug}}</td>
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
    <div   class="row mx-5">
    {!! $posts->links() !!}
    </div>
</div>

@endsection