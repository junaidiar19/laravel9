@extends('layouts.app')
@section('content')

<h6>{{ $user->name }}</h6>

<p>Blog Saya: </p>

@if ($user->blogs->count() > 0)
<div class="row">
  @foreach ($user->blogs as $blog)
    <div class="col-md-3">
      <x-card-blog :blog=$blog />
    </div>
  @endforeach
</div>
@else
    <p class="text-muted">-blog tidak tersedia-</p>
@endif
@endsection