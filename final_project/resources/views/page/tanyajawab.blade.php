@extends('layouts.master2')

@section('content')

<section class="cards-section text-center">
   
    <div class="container">
         
        <section class="doc-section text-left">
            <h2 class="section-title">Pertanyaan
            </h2>
           
            <div class="section-block">
                <h3 class="question text"><i class="fas fa-question-circle"></i> {{$pertanyaan->isi}}</h3>
                <div class="answer"> ditanyakan oleh: </div>
                
                <form method="POST" action="{{url('/jawaban')}}">
                    @csrf
                    <div class="answer text-right"> <button class="btn btn-danger btn-cta" type="submit"> Bantu Jawab</button></div>
                    <div class="section-title"></div>
                    <textarea class="form-control" rows="5" name="jawaban" placeholder="Enter ..."></textarea>
                    <input hidden name="id_penjawab" value=1 >
                    <input hidden name="id_pertanyaan" value={{$pertanyaan->id}}>
                    <input hidden name="created_at" value="{{ \Carbon\Carbon::now() }}">
                    <input hidden name="updated_at" value="{{ \Carbon\Carbon::now() }}">
                 </form>
                </div>
            </div>
            @foreach ($jawaban as $jawaban)
                <div class="section-block"> 
                    <h2 class="question text"><i class=""></i> Jawaban</h2>
                    <div class="answer">{{$jawaban->jawaban}}</div>
                    <div class="section-title"></div>
                    <div class="answer">dijawab oleh: $user->nama</div>
                    <div>
                        <form action="/komentar/create" method="POST">
                            @csrf
                            <input type="text" class="form-control" style="width:200px">
                            <button class="btn btn-primary" style="padding:4px display:inline" > Komentar Jawaban </button>

                        </form>
                    </div>
                    
                    
                </div>
            @endforeach
            
            
            <!--//section-block-->
        </section><!--//doc-section-->
        
    </div><!--//container-->
</section><!--//cards-section-->

@endsection