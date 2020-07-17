@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card p-4">
                <div class="card-header text-center text-uppercase h4 font-weight-light">
                    Register
                </div>
              <form method="POST" action="{{ route('register') }}">
                    @csrf
                  <div class="card-body py-5">
                      <div class="form-group">
                          <label class="form-control-label">Name</label>
                          <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>

                      <div class="form-group">
                          <label class="form-control-label">Email</label>
                          <input type="email" name="email" value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror">
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>

                      <div class="form-group">
                          <label class="form-control-label">Password</label>
                          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>

                      <div class="form-group">
                          <label class="form-control-label">Confirm Password</label>
                          <input type="password" name="password_confirmation" class="form-control">
                      </div>
                  </div>

                  <div class="card-footer">
                      <button type="submit" class="btn btn-success btn-block">Create Account</button>
                  </div>
              </form>
            </div>
        </div>
    </div>
</div>

@endsection
