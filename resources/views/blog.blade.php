@extends('layouts.app')
@section('content')

@push('after-styles')
  <style>
    .green {
      color: green;
    }
  </style>
@endpush

<div class="row">
  @foreach ($blogs as $blog)
    <div class="col-md-4">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="card-title">{{ $blog->title }}</h6>
        </div>
        <div class="card-body">
          <p>{{ $blog->description }}</p>
        </div>
        <div class="card-footer">
          <a href="" class="btn btn-primary">Read More</a>
        </div>
      </div>
    </div>
      
  @endforeach
</div>
@endsection