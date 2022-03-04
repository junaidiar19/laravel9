@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-7">
      <div class="card">
        <div class="card-body">
          <h6>{{ $blog->title }}</h6>
          <img src="{{ $blog->image }}" class="img-fluid rounded mb-2" alt="">
          <a href="" class="text-primary fs-6 text-decoration-none">By. {{ $blog->author->name }}</a>
          <p class="text-muted mt-2">{{ $blog->body }}</p>
        </div>
      </div>
    </div>
</div>
@endsection