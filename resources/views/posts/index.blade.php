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
            <td>{{$post->created_at}}</td>
            <td>
                <a href="{{route('posts.show',['post'=>$post->id])}}" class="btn btn-info btn-sm">View</a>
                <a href="{{route('posts.edit',['post'=>$post->id])}}" class="btn btn-primary btn-sm">Edit</a>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>   
</div>

@endsection