@extends('layouts.app')
@section('content')

@push('after-styles')
  <style>
    .green {
      color: green;
    }
  </style>
@endpush

  <h1 class="green">this is blog page | {{ $data }} | {{ $active }}</h1>
@endsection