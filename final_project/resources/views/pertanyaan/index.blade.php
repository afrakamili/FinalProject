@extends('layouts.master2')

@section('content')

<div class="ml-3 mt-3">
  <h1>Data Forum Tanya-Jawab</h1>
  <a href="/pertanyaan/create" class="btn btn-primary mb-3">
  Buat pertanyaan baru
  </a>

  <table class="table table-bordered mt-2">
      <thead>                  
        <tr>
          <th style="width: 10px">No</th>
          
          <th>Pertanyaan</th>
          <th>Detail Jawaban</th>
          <th>Form Jawaban</th>
          <th>Detail QnA</th>
          <th>Action</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach($pertanyaan as $key => $pertanyaan)
        <tr>
          <td>{{$key+1}}</td>
          <td>{{$pertanyaan->isi}}</td>
          {{-- <td>
            <a href="{{url('/jawaban/'.$pertanyaan->id) }}">
              <button class="btn btn-success"> Lihat Jawaban</button>
            </a>
          </td> --}}
          <td>
            <form action="{{ url('/jawaban/' .$pertanyaan->id) }}" method="post">
            @csrf
              <input type="text" name="isi">
              <input hidden name="pertanyaan_id" value="{{$pertanyaan->id}}">
              <input hidden name="tanggal_dibuat" value="{{\Carbon\Carbon::now()}}">
              <input hidden name="tanggal_diperbaharui" value="{{\Carbon\Carbon::now()}}">
              <button type="submit" class="btn btn-success">submit jawaban</button>
            </form>
          </td>
          <td>
            <a href="{{url('/pertanyaan/'.$pertanyaan->id) }}">
              <button class="btn btn-primary">Lihat QnA</button>
            </a>
          </td>
          <td>
          <a href="{{url('/pertanyaan/'.$pertanyaan->id) . '/edit' }}">
              <button class="btn btn-default">Edit</button>
          </a>

          <form action="{{url('/pertanyaan/'. $pertanyaan->id)}}" style="display: inline" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
          </form>
          </td>
        </tr>
        @endforeach
        
      </tbody>
  </table>
</div>

    
@endsection