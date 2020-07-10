@extends('layouts.master2')

@section('content')

<section class="cards-section text-center">
   
    <div class="container">
         
        <section class="doc-section text-left">
            <h2 class="section-title">Pertanyaan
            </h2>
           
            <div class="section-block">
                <h3 class="question text"><i class="fas fa-question-circle"></i> Can I viverra sit amet quam eget lacinia?</h3>
                <div class="answer mb-3"> 
                    <ul class="list-inline float-left px-2">
                        <li class="list-inline-item"><a href="" class="text-secondary"><i class="fa fa-user"></i> oleh</a></li>
                        <li class="list-inline-item"><a href="" class="text-secondary"><i class="fa fa-comment"></i> beri komentar</a></li>
                    </ul>
            
                    <ul class="list-inline float-right px-2">
                        <li class="list-inline-item"><a href="" class="text-secondary"><i class="fa fa-thumbs-up"></i> vote up</a></li>
                        <li class="list-inline-item"><a href="" class="text-secondary"><i class="fa fa-thumbs-down"></i> vote down</a></li>
                    </ul>
                </div>
                <br>
                <h2 class="section-title"></h2>
                <span class="bg-secondary text-white-50">created_at</span>

                <div class="answer mb-3">
                <form method="POST" action="" class="">
                    <div class="float-left mb-4 my-4">
                    <button class="btn btn-danger btn-cta" type="submit"> Bantu Jawab</button>
                    </div>
                    
                    <textarea class="form-control" rows="5" name="jawaban" placeholder="Enter ..."></textarea>
                    <input hidden name="id_penjawab" value=1 >
                    <input hidden name="created_at" value="{{ \Carbon\Carbon::now() }}">
                    <input hidden name="updated_at" value="{{ \Carbon\Carbon::now() }}">
                 </form>
                </div>
            </div>
            <div class="section-block"> 
                <h2 class="question text"><i class="fa fa-star"></i> Jawaban</h2>
                <div class="answer">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere.</div>
                <div class="section-title"></div>
                <div class="answer mb-2">
                    <ul class="list-inline float-left px-2">
                        <li class="list-inline-item"><a href="" class=""><i class="fa fa-user"></i> dijawab oleh</a></li>
                        <li class="list-inline-item"><a href="" class=""><i class="fa fa-comment"></i> beri komentar</a></li>
                    </ul>
                
                    <ul class="list-inline float-right px-2">
                        <li class="list-inline-item"><a href="" class=""><i class="fa fa-thumbs-up"></i> vote up</a></li>
                        <li class="list-inline-item"><a href="" class=""><i class="fa fa-thumbs-down"></i> vote down</a></li>
                    </ul>
                </div>
                <br>
                <h2 class="section-title"></h2>
                <span class="bg-info text-white-50">post at</span>
            </div>
            <div class="section-block"> 
                <h2 class="question text"><i class=""></i> Jawaban</h2>
                <div class="answer">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere.</div>
                <div class="section-title"></div>
                <div class="answer mb-2">
                    <ul class="list-inline float-left px-2">
                        <li class="list-inline-item"><a href="" class=""><i class="fa fa-user"></i> dijawab oleh</a></li>
                        <li class="list-inline-item"><a href="" class=""><i class="fa fa-comment"></i> beri komentar</a></li>
                    </ul>
                    
                    <ul class="list-inline float-right px-2">
                        <li class="list-inline-item"><a href="" class=""><i class="fa fa-thumbs-up"></i> vote up</a></li>
                        <li class="list-inline-item"><a href="" class=""><i class="fa fa-thumbs-down"></i> vote down</a></li>
                    </ul>
                </div>
                <br>
                <h2 class="section-title"></h2>
                <span class="bg-info text-white-50">post at</span>
            </div>
            <!--//section-block-->
        </section><!--//doc-section-->
        
    </div><!--//container-->
</section><!--//cards-section-->

@endsection