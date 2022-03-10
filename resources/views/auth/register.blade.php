@extends('layouts.app')
@section('content')

<div class="row justify-content-center mt-5">
  <div class="col-md-4">
    <div class="card shadow-sm">
      <div class="card-header bg-white text-center">
        <h6>Form Register</h6>
      </div>
      <div class="card-body">
        <x-alert />
        <form action="{{ route('registration') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="">Nama</label>
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
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
          <div class="form-group">
            <label for="">Password Confirmation</label>
            <input type="password" name="password_confirmation" class="form-control" value="{{ old('password') }}">
          </div>
          <div class="d-grid">
            <button class="btn btn-primary">Register</button>
          </div>
        </form>

        <div class="text-center mt-3">
          <p>Sudah punya Akun? <a href="{{ route('login') }}">Login</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection