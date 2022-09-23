@extends('layout_user')
@section('content_user')

<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <div class="row">
            @foreach ($nodes as $node)
                <div class="col-md-3">
                    <div class="white_card position-relative mb_20 ">
                        <div class="card-body">
                            <div class="ribbon1 rib1-primary"><span class="text-white text-center rib1-primary">New</span></div>
                                <img src="img/products/img-5.png" alt="" class="d-block mx-auto my-4" height="150">
                                <div class="row my-4">
                                    <div class="col"><span class="badge_btn_3  mb-1">Nom:</span> <a href="#" class="f_w_400 color_text_3 f_s_14 d-block">{{$node->name}}</a></div>
                                        <div class="col-auto">
                                            <h4 class="text-dark mt-0">{{$node->type}}</h4>
                                            
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <a class="btn_2"  href="/showComments/{{$node->id}}">Comment</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>



@endsection