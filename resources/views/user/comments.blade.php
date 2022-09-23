@extends('layout_user')
@section('content_user')





<div class="row">
    <div class="col-12">
        <div class="white_card position-relative mb_20">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <img src="{{asset('img/products/01.png')}}" alt="" class="mx-auto d-block sm_w_100" height="300" />
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="single-pro-detail">
                            <p class="mb-1">Infos</p>
                                <div class="custom-border mb-3"></div>
                                    <h3 class="pro-title">{{$node->name}}</h3>
                                    <p class="text-muted mb-0">informations</p>
                                    <ul class="list-inline mb-2 product-review">
                                        <li class="list-inline-item">4.5 (9830 reviews)</li>
                                    </ul>
                                    <h2 class="pro-price">Informations</h2>
                                    <h6 class="text-muted font_s_13 mt-2 mb-1">{{$node->description}}</h6>
                                    <ul class="list-unstyled pro-features border-0">
                                        <li>{{$node->type}}</li>
                                        <li>...</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="messages_box_area">
                <div class="messages_chat mb_30">
                    <div class="white_box ">

                        <?php if($comments){?>
                            @foreach ($comments as $comment) {
                                <?php if ($comment->user_id !=1) { ?>
                                   <div class="single_message_chat">
                                        <div class="message_pre_left">
                                            <div class="message_preview_thumb">
                                                <img src="{{asset('img/messages/1.png')}}" alt="">
                                            </div>
                                            <div class="messges_info">
                                                <h4>Travor James</h4>
                                                <p>Yesterday at 6.33 pm</p>
                                            </div>
                                        </div>
                                        <div class="message_content_view red_border">
                                            
                                        </div>
                                    </div>
                                <?php ;}else{?>
                                    <div class="single_message_chat sender_message">
                                        <div class="message_pre_left">
                                            <div class="messges_info">
                                                <h4>Agatha Kristy</h4>
                                                <p>Yesterday at 6.33 pm</p>
                                            </div>
                                            <div class="message_preview_thumb">
                                                <img src="{{asset('img/messages/1.png')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="message_content_view">
                                        
                                        </div>
                                    </div>
                                <?php ;} ?>
                        <?php } ?>
                        <div class="message_send_field">
                            <form methode='Post' action="/saveComment" > 
                                <input type="text" name="details" id="content" placeholder="Write your message"> 
                                <br>
                                <button class="btn_1" type="submit">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection