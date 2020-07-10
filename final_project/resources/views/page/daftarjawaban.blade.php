@extends('layouts.master2')

@section('content')
<div class="card ml-3">
  
    <table class="table table-bordered mt-2 ml 3">
      <thead>
        <tr>
          <th>No</th>
          <th>Jawaban</th>
          {{-- <th>Action</th> --}}
        </tr>
      </thead>

      <tbody>
      @foreach ($jawaban as $key => $jawaban)
        <tr>
          <td>{{$key+1}}</td>
          <td>{{$jawaban->jawaban}}</td>
          {{-- <td>{{$jawaban -> pertanyaan -> isi}}</td> --}}
          {{-- <td>
          <a href="{{url('/jawaban/'.$jawaban->id) . '/edit' }}">
              <button class="btn btn-default">Edit</button>
          </a></td>
        </tr> --}}
        @endforeach
      </tbody>
    </table>
  
    
</div>

@endsection