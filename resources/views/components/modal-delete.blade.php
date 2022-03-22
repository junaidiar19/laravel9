@push('modal-section')
  <!-- Modal Delete ini agak sedikit berbeda makanya dibikinkan 1 komponen khusus saja -->
  <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST">
          @csrf
          @method('DELETE')
          <div class="modal-body">
            <p>Anda yakin ingin menghapus data?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn text-danger" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Ya</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('#modalDelete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var title = button.data('title') // get value pada atribut data-title pada tag button
        var url = button.data('url') // get value pada atribut data-url pada tag button hapus
        var modal = $(this); // define modal yang sedang aktif

        modal.find('.modal-title').text(title) // set title pada modal
        modal.find('form').attr('action', url) // set action form modal
      })
    })
  </script>
@endpush
