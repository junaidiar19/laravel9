@extends('layouts.app')
@section('content')

<h6 class="mb-4">Kategori: {{ $category->name }}</h6>

<div class="row">
  @foreach ($blogs as $blog)
    <div class="col-md-3">
      <x-card-blog :blog=$blog />
    </div>
  @endforeach
</div>

@endsection