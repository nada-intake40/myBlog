@extends('layouts.app')

@section('content')
 <div class="container border bg-light">
     <h4 class="my-3 ml-3">Post Info</h4>
 </div>
 <div class="container border" style="font-size: 25px;">
     <p class="ml-3 mt-3"><span class="font-weight-bolder">Title : </span>{{$post->title}}</p>
     <p class="ml-3 mb-3"><span class="font-weight-bolder">Description : </span>{{$post->description}}</p>
 </div>

 <div class="container border bg-light mt-5">
     <h4 class="my-3 ml-3">Post Creator Info</h4>
 </div>
 <div class="container border" style="font-size: 25px;">
     <p class="ml-3 mt-3"><span class="font-weight-bolder" >Name : </span>{{$post->user ? $post->user->name : 'not exist'}}</p>
     <p class="ml-3 mb-3"><span class="font-weight-bolder">Email : </span>{{$post->user ? $post->user->email : 'not exist'}}</p>
     <p class="ml-3 mb-3"><span class="font-weight-bolder">Created At : </span>{{$post->user->created_at->format('l jS \\of F Y h:i:s A') }}</p>
 </div>

@endsection