<div class="form-group">
  <label for="">Kode</label>
  <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" value="{{ old('kode', $book->kode ?? 'BK-') }}" required>
  @error('kode')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<div class="form-group">
  <label for="">Judul</label>
  <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', @$book->title) }}">
  @error('title')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<div class="form-group">
  <label for="">Jumlah</label>
  <input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror" value="{{ old('qty', @$book->qty) }}">
  @error('qty')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<div class="form-group">
  <label for="">Harga</label>
  <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', @$book->price) }}">
  @error('price')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<div class="form-group">
  <label for="">Kategori</label>
  <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
    <option value="">-Silakan Pilih-</option>
    @foreach ($categories as $category)
        <option 
          value="{{ $category->id }}"
          {{ (old('category_id', @$book->category_id) == $category->id) ? 'selected' : '' }}
        >{{ $category->name }}</option>
    @endforeach
  </select>
  @error('category_id')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
<div class="d-flex align-items-center mb-3">
  <input type="checkbox" name="published" id="published" class="me-2" value="1" {{ (old('published', @$book->published) == 1) ? 'checked' : '' }}>
  <label for="published">Published</label>
</div>
<div class="d-grid">
  <button class="btn btn-primary">Simpan</button>
</div>