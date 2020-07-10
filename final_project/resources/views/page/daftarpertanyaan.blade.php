@extends('layouts.master2')

@section('content')

<section class="cards-section text-center">
    <div class="main-search-box pt-3 pb-4 d-inline-block">
        <form class="form-inline search-form justify-content-center" action="" method="get">
   
           <input type="text" placeholder="Cari yg pernah ditanyakan" name="search" class="form-control search-input">
           
           <button type="submit" class="btn search-btn" value="Search"><i class="fas fa-search"></i></button>
           
       </form>
    </div>
    <div class="container">
        <h2 class="title">Malu Bertanya Sesat dijalan</h2>
        <div class="intro">
            <p>Silahkan menjawab, karena jawaban anda mungkin solusi buat orang lain</p>
            <div class="cta-container">
            <a class="btn btn-primary btn-cta" href="/pertanyaan/create" target="_blank"> Silahkan Bertanya</a>
            </div><!--//cta-container-->
        </div><!--//intro-->
        <div id="cards-wrapper" class="cards-wrapper row">
            @foreach ($pertanyaan as $pertanyaan)
            <div class="item item-green col-lg-4 col-4">
                <div class="item"> 
                    <div class="card-header bg-transparent">
                    <h3 class="title">{{$pertanyaan->judul}} </h3>
                    </div>
                    <div class="card-body">
                    <p class="intro" >{{$pertanyaan->isi}}</p>
                        <a class="link" href="#"><span></span></a>
                        <span>Diajukan oleh {{ $pertanyaan->id_penanya }}</span>
                    </div>
                    <div class="card-footer bg-transparent">
                       Dibuat : {{$pertanyaan->created_at}}
                    <div class="btn-group-sm"> 
                        <a class="btn-orange" href="{{url('/jawaban/'.$pertanyaan->id)}}" data-size="large" >Lihat</a>
                        <a class="btn-orange" href="{{url('/pertanyaan/'.$pertanyaan->id) . '/edit' }}" data-size="large" >Edit</a> </div> 
                        <form action="{{url('/pertanyaan/'. $pertanyaan->id)}}" style="display:inline" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                    
                    @foreach ($pertanyaan->tags as $tag)
                         <button class="btn btn-primary btn-sm">{{$tag->tag_name}}</button>
                    @endforeach
                    
                </div>

            </div><!--//item-->
            @endforeach
            
            
        </div><!--//cards-->
        
    </div><!--//container-->
</section><!--//cards-section-->

@endsection