@extends('layouts.admin')

@section('title') User Comments @stop

@section('content')
  <div class="content">
    <div class="card">
        <div class="card-header bg-light">
            User comments
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Post</th>
                        <th>Content</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach(Auth::user()->comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td class="text-nowrap"> <a href="{{ route('singlePost', $comment->post_id) }}">{{$comment->post->title}}</a> </td>
                        <td>{{$comment->content}}</td>
                        <td>{{$comment->created_at->diffForHumans()}}</td>
                        <td>
                          <form id="deleteComment-{{$comment->id}}" class="" action="{{route('deleteComment', $comment->id)}}" method="post">
                            @csrf
                          </form>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteCommentModal-{{$comment->id}}"> <i class="icon icon-trash">Delete</i> </button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@foreach(Auth::user()->comments as $comment)
<!-- Modal -->
<div class="modal fade" id="deleteCommentModal-{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">You are about to delete Comment.</h4>
      </div>
      <div class="modal-body">
        Are you sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No, Keep it</button>
        <form id="deleteComment-{{$comment->id}}" class="" action="{{route('deleteComment', $comment->id)}}" method="post">
          @csrf
          <button type="submit" class="btn btn-primary">Yes, delete it</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@stop
