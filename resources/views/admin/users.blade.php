@extends('layouts.admin')

@section('title') Admin User @stop

@section('content')
  <div class="content">
    <div class="card">
        <div class="card-header bg-light">
            Admin User
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Posts</th>
                        <th>Comments</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td class="text-nowrap"> <a href="#">{{$user->name}}</a> </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->posts->count()}}</td>
                        <td>{{$user->comments->count()}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>


                        <td>
                          <a href="{{route('adminEditUser', $user->id)}}" class="btn btn-warning"> <i class="icon icon-pencil"></i> </a>
                          <form id="deleteUser-{{$user->id}}" style="display:none" class="" action="{{route('adminDeleteUser', $user->id)}}" method="post">
                            @csrf
                          </form>
                          @if(Auth::user()->id != $user->id)
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteUserModal-{{$user->id}}"> <i class="icon icon-trash"></i> </a>
                          @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@foreach($users as $user)
<!-- Modal -->
<div class="modal fade" id="deleteUserModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">You are about to remove {{$user->name}}.</h4>
      </div>
      <div class="modal-body">
        Are you sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No, Keep it</button>
        <form id="deleteUser-{{$user->id}}" class="" action="{{route('adminDeleteUser', $user->id)}}" method="post">
          @csrf
          <button type="submit" class="btn btn-primary">Yes, delete it</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
@stop
