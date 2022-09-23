@extends('layout')
@section('content')





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

                        <?php if($comments){ ?>
                            @foreach ($comments as $comment)
                                <?php if ($comment->user_id !=1) { ?>
                                   <div class="single_message_chat">
                                        <div class="message_pre_left">
                                            <div class="message_preview_thumb">
                                                <img src="{{asset('img/messages/1.png')}}" alt="">
                                            </div>
                                            <div class="messges_info">
                                                <h4>Travor James</h4>
                                                <p>{{$comment->created_at}}</p>
                                            </div>
                                        </div>
                                        <div class="message_content_view">
                                            <span>{{$comment->content}}</span>
                                            {{$comment->details}}
                                        </div>
                                    </div>
                                <?php ;}else{?>
                                    <div class="single_message_chat sender_message">
                                        <div class="message_pre_left">
                                            <div class="messges_info">
                                                <h4>Agatha Kristy</h4>
                                                <p>{{$comment->created_at}}</p>
                                            </div>
                                            <div class="message_preview_thumb">
                                                <img src="{{asset('img/messages/1.png')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="message_content_view">
                                            <span>{{$comment->content}}</span>
                                            {{$comment->details}}
                                            <hr>
                                            <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="badge_btn_1"><i class="ti-pencil"></i></a>
                                            <a href="/deleteComment/{{$comment->id}}" onclick="return confirm('Supprimer ce commentaire ?');" class="badge_btn_1"><i class="ti-trash"></i></a>
                                        </div>
                                    </div>
                                <?php } ?>
                            @endforeach
                        <?php } ?>
                        <div class="message_send_field">
                            <form method='POST' action="/saveComment/{{$node->id}}"> 
                                @csrf
                                <label class="form-label" for="content">Content</label>
                                <input type="text" class="form-control" name="content" id="content" placeholder="Write your content"> 
                                <label class="form-label" for="details">Details</label>
                                <textarea  class="form-control" name="details" id="details" placeholder="Write your datails"> </textarea>
                                <button class="btn_1 mb-3 mt-3" type="submit">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/updateComment/{{$node->id}}">
                @csrf
                <label class="form-label" for=""></label>
                <input class="form-label" type="text" value="<?= ?>">
                <label class="form-label" for=""></label>
                <input class="form-label" type="text" value="<?= ?>">
        
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


<div class="modal fade" id="editComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. A sed esse voluptates, minima neque asperiores, fuga, explicabo amet repudiandae odio et architecto nihil quibusdam blanditiis eos similique. Quisquam laboriosam modi eos tempore, dicta odit animi delectus provident consequatur suscipit quae! Accusantium tempore magni ab reprehenderit at reiciendis impedit sequi illo. </p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</div>

<script>
    function editC(){
        $('#exampleModal').show('modal')
    }
</script>
@endsection