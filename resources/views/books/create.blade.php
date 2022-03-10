@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
  <div class="col-md-4">
    <a href="{{ route('books.index') }}">Kembali</a>
    <div class="card mt-3">
      <div class="card-header text-center">
        <h6>Tambah Buku</h6>
      </div>
      <div class="card-body">
        <x-alert />
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @include('books._form')
        </form>
      </div>
    </div>
  </div>
</div>

@endsection