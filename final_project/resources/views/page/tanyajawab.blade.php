@extends('layouts.master1')

@section('content')
<section class="cards-section text-center">
   
    <div class="container">
        <a class="btn btn-outline-success" href="{{ url('/pertanyaan') }}">Back to Forum</a>
        <section class="doc-section text-left">
          @if ( Auth::user()->id == $pertanyaan->id_penanya )
            <div class="btn-group-sm float-right px-2">
                <a class="btn btn-sm btn-warning" href="{{url('/pertanyaan/'.$pertanyaan->id) . '/edit' }}" data-size="large" >Edit</a> 
                <form action="{{url('/pertanyaan/'. $pertanyaan->id)}}" style="display:inline" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </div>
            @endif
            
            <h2 class="section-title">Pertanyaan
            </h2>
            <div class="section-block"></div>
            
                <h3 class="question text"><i class="fas fa-question-circle"></i> {{$pertanyaan->isi}}</h3>
                <div class="answer mb-3"> 
                    <ul class="list-inline float-left px-2">
                        <li class="list-inline-item"><a href="#" class="text-secondary"><i class="fa fa-user"></i> oleh: {{$pertanyaan-> user -> name}}</a></li>
                        <li class="list-inline-item"><a href="#" class="text-secondary"><i class="fa fa-comment"></i> beri komentar</a></li>
                    </ul>
                                            
                    <ul class="list-inline float-right px-2">
                        <li class="list-inline-item">Vote : </li>
                        <li class="list-inline-item">
                          <form action="/voteup/pertanyaan" style="display:inline" method="post">
                            @csrf
                                <input hidden name="user_id" value = "{{Auth::user()->id}}">
                                <input hidden name="pertanyaan_id" value = "{{$pertanyaan->id}}">
                                <input hidden name="id_penanya" value ="{{$pertanyaan ->id_penanya}}">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-thumbs-up"></i>vote up</button>
                            </form> </li>
                        </li>
                        <li class="list-inline-item">
                          <form action="/votedown/pertanyaan" style="display:inline" method="post">
                            @csrf
                                <input hidden name="user_id" value = "{{Auth::user()->id}}">
                                <input hidden name="pertanyaan_id" value = "{{$pertanyaan->id}}">
                                <input hidden name="id_penjawab" value ="{{$pertanyaan ->id_penanya}}">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-thumbs-down"></i> vote down</button>
                            </form>
                        </li>
                     </ul>
                </div>
                
                <br>
                <h2 class="section-title"></h2>
                <span class="bg-secondary text-white-50">{{$pertanyaan->created_at}}</span>
                <br>
                @foreach ($komentar_pertanyaan as $komentar)
                  <div class="answer text-left badge-secondary text-white">
                    <p><i class=" fas fa-comment inline-block"></i> {{$komentar->komentar}} </p>
                  </div><!--//coment-->
                @endforeach
                
                <div class="answer mb-1 mt-1">
                  <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Beri Komentar</button>
                  <div id="demo" class="collapse">
                   <form method="POST" action="{{ url('/komentarpertanyaan/create') }}">
                    @csrf
                    <textarea class="col-lg-6" name="komentar" rows="2" placeholder="Isi komentar yg postif" required="true"></textarea>
                    <input hidden name="id_tukangkomen" value={{ Auth::user()->id }}>
                    <input hidden name="id_pertanyaan" value={{$pertanyaan->id}}>
                    <input hidden name="created_at" value="{{ \Carbon\Carbon::now() }}">
                    <input hidden name="updated_at" value="{{ \Carbon\Carbon::now() }}">
                    <button class="btn btn-info inline" type="submit">Submit</button>
                  </form>
                  </div>
                </div>
                <br>
                <div class="answer mb-3 mt-3">

                <div class="answer mb-3">
                
                <form method="POST" action="{{url('/jawaban')}}">
                    @csrf
                    <div class="answer text-right"> <button class="btn btn-danger btn-cta" type="submit"> Bantu Jawab</button></div>
                    <div class="section-title"></div>
                    <textarea class="form-control" rows="5" name="jawaban" placeholder="Enter ..." required="true"></textarea>
                    <input hidden name="id_penjawab" value={{ Auth::user()->id }}>
                    <input hidden name="id_pertanyaan" value={{$pertanyaan->id}}>
                    <input hidden name="created_at" value="{{ \Carbon\Carbon::now() }}">
                    <input hidden name="updated_at" value="{{ \Carbon\Carbon::now() }}">
                 </form>
                </div>
          
                @foreach ($jawaban as $jawaban)
                
                <div class="section-block"></div>
                    <h2 class="question text"><i class=""></i> Jawaban </h2>
                    <div class="answer">{{$jawaban->jawaban}}</div>
                    <div class="section-title"></div>
                    <div class="answer mb-2">
                        <ul class="list-inline float-left px-2">
                            <li class="list-inline-item"><a href="#" class=""><i class="fa fa-user"></i> dijawab oleh : </a></li>
                            <li class="list-inline-item"><a href="#"  data-toggle="modal" data-target="#onkomentarjawaban" class=""><i class="fa fa-comment"></i> beri komentar</a></li>
                        </ul>                         
                        

                        <ul class="list-inline float-right px-2">
                            <li class="list-inline-item">Vote : </li>
                            <li class="list-inline-item">
                                <form action="/voteup/jawaban" style="display:inline" method="post">
                                @csrf
                                    <input hidden name="user_id" value = "{{Auth::user()->id}}">
                                    <input hidden name="id_pertanyaan" value = "{{$pertanyaan->id}}">
                                    <input hidden name="jawaban_id" value = "{{$jawaban->id}}">
                                    <input hidden name="id_penjawab" value ="{{$jawaban ->id_penjawab}}">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-thumbs-up"></i>vote up</button>
                                </form> </li>
                            <li class="list-inline-item">
                                <form action="/votedown/jawaban" style="display:inline" method="post">
                                    @csrf
                                        <input hidden name="user_id" value = "{{Auth::user()->id}}">
                                        <input hidden name="id_pertanyaan" value = "{{$pertanyaan->id}}">
                                        <input hidden name="jawaban_id" value = "{{$jawaban->id}}">
                                        <input hidden name="id_penjawab" value ="{{$jawaban ->id_penjawab}}">
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-thumbs-down"></i> vote down</button>
                                  </form> </li>
                        </ul>
                    </div>
                    <br>
                    <h2 class="section-title"></h2>
                    <span class="bg-info text-white-50">{{$jawaban->created_at}}</span>
                    
                    
                    
                    @if ( Auth::user()->id == $pertanyaan->id_penanya )
                      @if ($jawaban->votes == 1)
                      <p style=" float-right inline"> <i class="fa fa-star " style="color:yellow"></i> jawaban terbaik </p>
                      @else
                      {{-- <form action="/jawabanterbaik">
                        @csrf
                        <input hidden name="jawabanterbaik" value =1>
                        <button class= "btn btn-primary" style="background:none; border:none; padding:0px"><i class="fa fa-star" style="color:blue"> </i> = </button> <span> pilih jawaban terbaik</span>
                        
                      </form> --}}
                      <a href="{{url('/jawabanterbaik/' . $jawaban->id)}}" class=" float-right inline">jadikan jawaban terbaik <i class="fa fa-star" ></i></a>
                      @endif
                    @endif
                    <br>
                    @foreach ($jawaban -> komentar as $komentar)
                      <div class="answer text-left badge-secondary text-white">
                        <p><i class=" fas fa-comment inline-block"></i> {{$komentar -> komentar}} </p>
                      </div><!--//coment-->
                    @endforeach
                      
                  
                
                @endforeach
            </div>  
        </div>    
            
            
            
            <!--//section-block-->
        </section><!--//doc-section-->
        
    </div><!--//container-->
</section><!--//cards-section-->

<div id="onkomentarjawaban" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         Close
        </button>
      </div>
      <div class="modal-body">
        <!-- form login -->
        <form action="{{ url('/komentarjawaban/create') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="username"></label>
              <input type="text" name="komentar" placeholder="Isi Komentar yang Positif" class="form-control" required="true">
              <input hidden name="id_tukangkomen" value="{{ Auth::user()->id }}">
              <input hidden name="id_pertanyaan" value="{{$pertanyaan->id}}">
              <input hidden name="id_jawaban" value="{{$jawaban->id}}">
              <input hidden name="created_at" value="{{ \Carbon\Carbon::now() }}">
              <input hidden name="updated_at" value="{{ \Carbon\Carbon::now() }}">
            <div class="text-right">
            <button class="btn btn-danger" type="submit">Submit</button>
          </div>
        </form>
        <!-- end form login -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection