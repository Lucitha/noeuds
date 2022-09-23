@extends('layout')
@section('content')
<div class="container-fluid p-0 ">

    <div class="row">
        <div class="col-12">
            <div class="page_title_box d-flex align-items-center justify-content-between">
                <div class="page_title_left">
                    <h3 class="f_s_30 f_w_700 text_white">Dashboard</h3>
                    <ol class="breadcrumb page_bradcam mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Salessa </a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Sales</li>
                    </ol>
                </div>
                <a href="/" class="white_btn3">New Nodes</a>
            </div>
        </div>
    </div>
    <div class="white_card_body QA_section">
        <div class="QA_table ">
            <table class="table p-0">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nodes as $node)
                        <tr>
                            <td class="f_s_14 f_w_400 color_text_4">{{$node->name}}</td>
                            <td class="f_s_14 f_w_400 text-end"><a href="#" class="badge_btn_1">{{$node->type}}</a></td>
                            <td class="f_s_14 f_w_400 color_text_3">{{$node->description}}</td>
                            <td class="f_s_14 f_w_400 text-end">
                                <a href="/editNode/{{$node->id}}" onclick="return confirm('Supprimer ce noeud ?');" class="badge_btn_1" ><i class="ti-pencil"></i></a>
                                <a href="/deleteNode/{{$node->id}}" class="badge_btn_1"><i class="ti-trash"></i></a> 
                                <a href="/showComments/{{$node->id}}" class="badge_btn_1"><i class="ti-eye"></i></a> 
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection 