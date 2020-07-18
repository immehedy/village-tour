@extends('layouts.admin')
@section('title') User Dashboard @endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <span class="h4 d-block font-weight-normal mb-2">{{Auth::user()->comments->count()}}</span>
                            <span class="font-weight-light">Comments</span>
                        </div>

                        <div class="h2 text-muted">
                            <i class="icon icon-book-open"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card p-4">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <span class="h4 d-block font-weight-normal mb-2">{{Auth::user()->comments()->distinct('post_id')->count('post_id')}}</span>
                            <span class="font-weight-light">Commented Posts</span>
                        </div>

                        <div class="h2 text-muted">
                            <i class="icon icon-paper-clip"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Comments by days
                    </div>

                    <div class="card-body p-0">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
