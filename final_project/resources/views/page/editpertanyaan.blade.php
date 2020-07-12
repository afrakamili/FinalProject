@extends('layouts.master2')

@section('content')
<div class="container">
  <br>
  <br>
  <div class="card">
    <div class="card-header bg-light">
      <h3 class="card-title">EDIT PERTANYAAN</h3>
    </div>
    
     <form action="/pertanyaan/{{$pertanyaan->id}}" method="POST">
          @csrf
          @method('PUT')
          <div class="card-body bg-light">
              <div class="form-group">
                <label >Judul Pertanyaan</label>
              <input type="text" class="form-control" name="judul" placeholder=" Judul" value="{{$pertanyaan->judul}}" required="true">
              </div>
              <div class="form-group">
                <label >Isi Pertanyaan</label>
                <textarea class="form-control" rows="5" name="isi" placeholder="{{$pertanyaan->isi}}" required="true"></textarea>
              </div>
              
                <div class="form-group">
                  <label for="exampleInputEmail1">#Tag</label>
                  <input type="text" class="form-control" name="tag">
                </div>
              
              <input hidden name="id_penulis" value=1>
              <input hidden name="created_at" value="{{ \Carbon\Carbon::now() }}">
              <input hidden name="updated_at" value="{{ \Carbon\Carbon::now() }}">
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          
          </form>
</div>
<br>
</div>


@endsection