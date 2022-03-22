@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h6>Data Kategori</h6>
        </div>
      </div>
      <div class="card-body">
        <x-alert />
        <form method="POST" action="{{ route('categories.store') }}">
        @csrf
          <div class="row mb-3">
            <div class="col-md-5">
              <input type="text" name="name" class="form-control" placeholder="Nama Kategori" required>
            </div>
            <div class="col-md-3">
              <button class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </form>
        <div class="table-responsive">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($categories as $category)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $category->name }}</td>
                  <td>
                    <button class="btn btn-danger" data-url="{{ route('categories.destroy', $category->id) }}" data-bs-toggle="modal" data-bs-target="#modalDelete" data-title="Hapus Kategori">Hapus</button>
                    <button class="btn btn-success" data-url="{{ route('categories.edit', $category->id) }}" data-bs-toggle="modal" data-bs-target=".modalOpen" data-title="Edit Kategori">Edit</button>
                    <button class="btn btn-primary" data-url="{{ route('categories.show', $category->id) }}" data-bs-toggle="modal" data-bs-target=".modalOpen" data-title="Detail Kategori">Detail</button>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="3" align="center">-tidak ada data-</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <x-pagination :pagination="$categories" />
      </div>
    </div>
  </div>
</div>

{{-- include modal delete component --}}
<x-modal-delete />

{{-- include modal edit component --}}
<x-modal />

@endsection