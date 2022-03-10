@extends('layouts.app')
@section('content')

<div class="row justify-content-center mt-5">
  <div class="col-md-4">
    <div class="card shadow-sm">
      <div class="card-header bg-white text-center">
        <h6>Form Login</h6>
      </div>
      <div class="card-body">
        <x-alert />
        <form action="{{ route('login.authenticate') }}" method="POST">
        @csrf
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="d-grid">
            <button class="btn btn-primary">Login</button>
          </div>
        </form>

        <div class="text-center mt-3">
          <p>Belum punya Akun? <a href="{{ route('register') }}">Register</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection