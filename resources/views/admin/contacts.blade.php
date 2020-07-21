@extends('layouts.admin')

@section('title') Admin Contacts @stop
@section('content')
  <div class="content">
    <div class="card">
        <div class="card-header bg-light">
            Admin comments
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Created at</th>

                    </tr>
                    </thead>
                    <tbody>
                      @foreach($contacts as $contact)
                    <tr>
                        <td>{{$contact->id}}</td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->phone}}</td>
                        <td>{{$contact->message}}</td>
                        <td>{{$contact->created_at->diffForHumans()}}</td>
                        <td><a href="https://gmail.com/" target="_blank" class="btn btn-dark"> <i class="fa fa-reply"></i> Reply</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
