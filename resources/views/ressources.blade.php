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
                            <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" value='<?= $info !='' ? $info->name : '' ; ?>' name="name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="inputState">Type</label>
                            <select id="type" name="type" class="form-control @error('type') is-invalid @enderror">
                                <option hidden desable value="">Choose...</option>
                                <option {{($info !='' ) && ($info->type==1)? 'selected': ''}} value='1'>A</option>
                                <option {{($info !='' ) && ($info->type==2)? 'selected': ''}} value='2'>B</option>
                                <option {{($info !='' ) && ($info->type==5)? 'selected': ''}} value='5'>C</option>
                                <option {{($info !='' ) && ($info->type==4)? 'selected': ''}} value='4'>D</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label"  for="information" >Information</label>
                        <textarea name="information"  class="form-control  @error('information') is-invalid @enderror"  id="information"><?= $info !='' ? $info->informations : '' ; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3 mt-3">Save</button>
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
                                <a href="/deleteRessource/{{$ressource->id}}" onclick="return confirm('Supprimer cette ressource ?');   S" class="badge_btn_1"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>






@endsection
