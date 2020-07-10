@extends('layouts.master2')

@section('content')
<div class="card card-primary mt-3">
  <div class="card-header">
    <h3 class="card-title">Pertanyaan Baru</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" action="/pertanyaan" method= "POST">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="judul">Judul Pertanyaan</label>
        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul pertanyaan">
      </div>
      <div class="form-group">
        <label for="isi">Isi Pertanyaan</label>
        <input type="text" class="form-control" id="isi" name="isi" placeholder="masukkan isi pertanyaan">
      </div>
      <div class="form-group">
        <label for="tags">Tag Pertanyaan</label>
        <input type="text" class="form-control" id="tags" name="tags" placeholder="tagnya mau apa">
      </div>
      <div class="form-group">
        <label for="id_penanya">Id penanya</label>
        <input type="text" class="form-control" id="id_penanya" name="id_penanya" placeholder="masukkan idmu">
      </div>
      
      
      
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div> 

@endsection