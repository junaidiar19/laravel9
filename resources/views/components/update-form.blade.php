<form action="{{ $url }}" method="POST">
  @csrf
  @method('PUT')
  <div class="modal-body">
    {{ $slot }}
  </div>
  <div class="modal-footer">
    <button type="button" class="btn" data-bs-dismiss="modal">Kembali</button>
    <button type="submit" class="btn btn-success">Simpan</button>
  </div>
</form>