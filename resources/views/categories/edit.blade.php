{{-- cara 1 bisa seperti ini --}}
{{-- <form action="{{ route('categories.update', $category->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="modal-body">
    <div class="form-group">
      <label for="">Nama</label>
      <input type="text" class="form-control" name="name" value="{{ $category->name }}">
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn" data-bs-dismiss="modal">Kembali</button>
    <button type="submit" class="btn btn-success">Simpan</button>
  </div>
</form> --}}

{{-- cara 2 bisa gunakan component untuk membungkus koding input form, agar lebih reusable --}}
<x-update-form :url="route('categories.update', $category->id)">
  <div class="form-group">
    <label for="">Nama</label>
    <input type="text" class="form-control" name="name" value="{{ $category->name }}">
  </div>
</x-update-form>

{{-- kesepakatan aja kalian mau pilih cara yg mana --}}