@extends('layouts.app')
@section('content')

<h6>{{ $user->name }}</h6>

<p>Blog Saya: </p>

@if ($user->blog->count() > 0)
<div class="row">
  @foreach ($user->blog as $blog)
    <div class="col-md-3">
      <div class="card mb-4">
        <div class="card-body">
          <img src="{{ $blog->image }}" class="img-fluid rounded mb-2" alt="">
          <a href="{{ route('users.detail', $blog->user_id) }}" class="text-primary fs-6 text-decoration-none">By. {{ $blog->author->name }}</a>
          <h6 class="mt-1">
            <a href="{{ route('blog.detail', $blog->slug) }}" class="text-dark text-decoration-none">{{ $blog->title }}</a>
          </h6>
          <p class="text-muted">{{ str()->limit($blog->body, 40) }}</p>
        </div>
      </div>
    </div>
  @endforeach
</div>
@else
    <p class="text-muted">-blog tidak tersedia-</p>
@endif
@endsection