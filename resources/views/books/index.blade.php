@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          <h6>Data Buku</h6>
          <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Buku</a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Kode</th>
                <th>Judul</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Publish</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($books as $book)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->kode }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->qty }}</td>
                    <td>{{ $book->price }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>
                      <input type="checkbox" {{ ($book->published) ? 'checked' : '' }}>
                    </td>
                    <td>
                      <button class="btn btn-danger">Hapus</button>
                      <a href="" class="btn btn-success">Edit</a>
                    </td>
                  </tr>
              @empty
                  
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection