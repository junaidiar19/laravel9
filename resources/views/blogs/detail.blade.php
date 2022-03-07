@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-7">
      <div class="card mb-3">
        <div class="card-body">
          <h6>{{ $blog->title }}</h6>
          <img src="{{ $blog->image }}" class="img-fluid rounded mb-2" alt="">
          <a href="" class="text-primary fs-6 text-decoration-none">By. {{ $blog->author->name }}</a>
          <p class="text-muted mt-2">{{ $blog->body }}</p>
        </div>
      </div>

      <h6 class="mb-3">Komentar ({{ $blog->comments_count }})</h6>

      <textarea name="body" class="form-control mb-3" cols="30" rows="4" placeholder="Tulis komentar Anda?"></textarea>
      <div class="text-end mb-3">
        <button class="btn btn-primary">Kirim</button>
      </div>

      <div class="card">
        <div class="card-body">

          @foreach ($comments as $comment)
          <div class="d-flex">
            <div class="flex-shrink-0">
              <img src="{{ asset('images/avatar.png') }}" height="40" class="rounded-circle" alt="User Avatar">
            </div>
            <div class="flex-grow-1 ms-3">
              <p class="mb-1 fw-semibold">{{ $comment->user->name }} <span class="text-muted fw-normal text-sm">{{ $comment->created_at->diffForHumans() }}</span></p>
              <p>
                {{ $comment->body }}
              </p>
            </div>
          </div>
          @endforeach

          {{ $comments->links() }}

        </div>
      </div>

    </div>
</div>
@endsection