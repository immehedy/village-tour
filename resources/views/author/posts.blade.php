@extends('layouts.admin')

@section('title') Author Posts @stop

@section('content')
  <div class="content">
    <div class="card">
        <div class="card-header bg-light">
            Author Posts
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Comments</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach(Auth::user()->posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td class="text-nowrap"> <a href="{{ route('singlePost', $post->id) }}">{{$post->title}}</a> </td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                        <td>{{$post->comments->count()}}</td>

                        <td>
                          <a href="{{route('postEdit', $post->id)}}" class="btn btn-warning">Edit</a>
                          <form id="deletePost-{{$post->id}}" class="" action="{{route('deletePost', $post->id)}}" method="post">
                            @csrf
                          </form>
                          <a href="#" class="btn btn-danger" onclick="document.getElementById('deletePost-{{$post->id}}').submit()">Remove</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
