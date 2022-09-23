@extends('layout')
@section('content')

<div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0">Form row</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <div class="card-body">
                <form method="Post" <?= $info !='' ? ' action="/updateRessources/'.$info->id.'"': ' action="/addRessources" ' ; ?>>
                    @csrf
                    <div class="row mb-3">
                        <div class=" col-md-6">
                            <label class="form-label"  for="inputCity">Nom</label>
                            <input type="text" class="form-control" id="name" value='<?= $info !='' ? $info->name : '' ; ?>' name="name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="inputState">Type</label>
                            <select id="type" name="type" class="form-control">
                                <option hidden desable>Choose...</option>
                                <option value='1'>A</option>
                                <option value='2'>B</option>
                                <option value='5'>C</option>
                                <option value='4'>D</option>
                            </select>
                        </div>  
                    </div>
                    <div class="col-12">
                        <label >Information</label>
                        <textarea name="information" id="information"><?= $info !='' ? $info->information : '' ; ?></textarea>
                        </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>

    <div class="white_card_body QA_section">
        <div class="QA_table ">
            <table class="table  p-0">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ressources as $ressource)
                        <tr>
                            <td class="f_s_14 f_w_400 color_text_4">{{$ressource->name}}</td>
                            <td class="f_s_14 f_w_400 text-end"><a href="#" class="badge_btn_1">{{$ressource->type}}</a></td>
                            <td class="f_s_14 f_w_400 color_text_3">{{$ressource->informations}}</td>
                            <td class="f_s_14 f_w_400 text-end">
                                <a href="/ressources/{{$ressource->id}}" class="badge_btn_1"><i class="ti-pencil"></i></a>
                                <a href="/deleteRessource/{{$ressource->id}}" class="badge_btn_1"><i class="ti-trash"></i></a> 
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editRessources">ii</button>
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="editRessources" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
</div>






@endsection