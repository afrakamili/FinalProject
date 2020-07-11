<div id="onkomentarpertanyaan" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <i class="fas fa-comment"></i>
          </button>
          <h4 class="modal-title">Form Komentar Pertanyaan</h4>
        </div>
        <div class="modal-body">
          <!-- form login -->
          <form action="{{ url('/komentarpertanyaan/create') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="username"></label>
                <input type="text" name="komentar" placeholder="Isi Komentar yang Positif" class="form-control">
                <input hidden name="id_tukangkomen" value="{{ Auth::user()->id }}">
                <input hidden name="id_pertanyaan" value="{{$pertanyaan->id}}">
              <div class="text-right">
              <button class="btn btn-danger" type="submit">Submit</button>
            </div>
          </form>
          <!-- end form login -->
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->