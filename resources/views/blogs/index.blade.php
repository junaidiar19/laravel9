@extends('layouts.app')
@section('content')

@push('after-styles')
  <style>
    .green {
      color: green;
    }
  </style>
@endpush

{{-- <x-alert>
  <span>Berhasil menambahkan blog</span>
</x-alert> --}}

<h6 class="mb-3">Total Blog: {{ $blogs->count() }}</h6>

<div class="row">
  @foreach ($blogs as $blog)
    <div class="col-md-3">
      <x-card-blog :blog=$blog />
    </div>
  @endforeach
</div>
@endsection