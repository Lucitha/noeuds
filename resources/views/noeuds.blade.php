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
                <form method="Post" action="/addNode">
                    @csrf
                    <div class="row mb-3">
                        <div class=" col-md-6">
                            <label class="form-label" for="inputCity">Nom</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="inputState">Type</label>
                            <select id="type" name="type" class="form-control @error('type') is-invalid @enderror">
                                <option hidden desable value="">Choose...</option>
                                <option value='1'>A</option>
                                <option value='2'>B</option>
                                <option value='5'>C</option>
                                <option value='4'>D</option>
                            </select>
                        </div>  
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="description" >Description</label>
                        <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3 mt-3">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection