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
        <x-alert />
        <form>
          <div class="row mb-3">
            <div class="col-md-3">
              <input type="text" name="search" class="form-control" placeholder="Pencarian..." value="{{ @$_GET['search'] }}">
            </div>
            <div class="col-md-3">
              <select name="category" class="form-control">
                <option value="">-Semua Kategori-</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ (@$_GET['category'] == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <button class="btn btn-warning w-50">Cari</button>
            </div>
          </div>
        </form>
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
                    <td>{{ $book->getPrice }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>
                      <input type="checkbox" {{ ($book->published) ? 'checked' : '' }}>
                    </td>
                    <td>
                      <form action="{{ route('books.destroy', $book->id) }}" class="d-inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                      </form>
                      <a href="{{ route('books.edit', $book->id) }}" class="btn btn-success">Edit</a>
                    </td>
                  </tr>
              @empty
                <tr>
                  <td colspan="8" align="center">-tidak ada data-</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        {{ $books->links() }}
      </div>
    </div>
  </div>
</div>

@endsection