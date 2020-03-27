@extends('layouts.app')

@section('content')
<form class="mx-5" method="POST" action="{{route('posts.store')}}">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1" class="font-weight-bold">Title</label>
    <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Your Post Title">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1" class="font-weight-bold">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description"></textarea>
  </div>
  
  <div class="form-group">
      <label for="exampleInputPassword1">Users</label>
      <select name="user_id" class="form-control">
        @foreach($users as $user)  
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>
    </div>

  <button type="submit" class="btn btn-success">Create</button>
</form>

@endsection