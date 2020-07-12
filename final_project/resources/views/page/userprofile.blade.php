@extends('layouts.master2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center"><a href="{{ url('/pertanyaan') }}" class="btn btn-cta btn-info">Kembali ke Forum</a></div>
            </div>
            <div class="section-block">
                <div class="jumbotron text-left">
                    <h2 class="text-center">PROFILE USER</h2>
                    <br>
                    <h1 class="text-center">{{ $datauser->name }}</h1>
                    <div class="author-profile text-center">
                    <a class="center-block" href="https://twitter.com/3rdwave_themes" target="_blank"><img src="{{ asset ('/assets/images/demo/author-profile.png') }}" alt=""></a>
                    </div><!--//author-profile-->
                    <div class="speech-bubble text-center">                    
                        <h3 class="speech-title">Reputasi</h3>

                        <p> {{ $datauser->reputasi }}</p>
                    </div>
                    
                    <div class="list list-inline text-center">
                        <a class="btn btn-cta btn-orange" href="" target="_blank"><i class="fa fa-envelope"></i> Kontak {{ $datauser->email }} </a>
                    </div>
                </div><!--//jumbotron-->
            </div><!--//section-block-->
            
        </section><!--//doc-section-->
        </div>
    </div>
</div>
@endsection
