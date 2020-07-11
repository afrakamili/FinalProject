@extends('layouts.master2')

@section('content')

<section class="cards-section text-center">
   
    <div class="container">
         
        <section class="doc-section text-left">
            <h2 class="section-title">Pertanyaan
            </h2>
           
            <div class="section-block">
                <h3 class="question text"><i class="fas fa-question-circle"></i> {{$pertanyaan->isi}}</h3>
                <div class="answer mb-3"> 
                    <ul class="list-inline float-left px-2">
                        <li class="list-inline-item"><a href="#" class="text-secondary"><i class="fa fa-user"></i> oleh :{{$pertanyaan->id_penanya}}</a></li>
                        <li class="list-inline-item"><a href="#" class="text-secondary"><i class="fa fa-comment"></i> beri komentar</a></li>
                    </ul>
                                            
                    <ul class="list-inline float-right px-2">
                        <li class="list-inline-item">Vote :{{$pertanyaan->votes}} </a></li>
                        <li class="list-inline-item"><a href="#" class="text-secondary"><i class="fa fa-thumbs-up"></i> vote up</a></li>
                        <li class="list-inline-item"><a href="#" class="text-secondary"><i class="fa fa-thumbs-down"></i> vote down</a></li>
                     </ul>
                </div>
                <br>
                <h2 class="section-title"></h2>
                <span class="bg-secondary text-white-50">{{$pertanyaan->created_at}}</span>

                <div class="answer mb-3">
                
                <form method="POST" action="{{url('/jawaban')}}">
                    @csrf
                    <div class="answer text-right"> <button class="btn btn-danger btn-cta" type="submit"> Bantu Jawab</button></div>
                    <div class="section-title"></div>
                    <textarea class="form-control" rows="5" name="jawaban" placeholder="Enter ..."></textarea>
                    <input hidden name="id_penjawab" value={{ Auth::user()->id }}>
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
                    <div class="answer mb-2">
                        <ul class="list-inline float-left px-2">
                            <li class="list-inline-item"><a href="#" class=""><i class="fa fa-user"></i> dijawab oleh : {{$jawaban->id_penjawab}}</a></li>
                            <li class="list-inline-item"><a href="#" class=""><i class="fa fa-comment"></i> beri komentar</a></li>
                        </ul>
                                                
                        <ul class="list-inline float-right px-2">
                            <li class="list-inline-item">Vote :{{$jawaban->votes}} </a></li>
                            <li class="list-inline-item"><a href="#" class=""><i class="fa fa-thumbs-up"></i> vote up</a></li>
                            <li class="list-inline-item"><a href="#" class=""><i class="fa fa-thumbs-down"></i> vote down</a></li>
                        </ul>
                    </div>
                    <br>
                    <h2 class="section-title"></h2>
                    <span class="bg-info text-white-50">{{$jawaban->created_at}}</span>
                </div>
            @endforeach
            
            
            <!--//section-block-->
        </section><!--//doc-section-->
        
    </div><!--//container-->
</section><!--//cards-section-->

@endsection