<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function newComment(Request $request,$id){

        if(empty($request->content) && empty($request->details)){
            $notify='Veuillez remplir tout les champs.';

        }else if(empty($request->content)){
             $notify= 'Veuillez saisir le nom de votre noeud.';

        }else if($request->details){
            $notify='Veuillez choisir le type de votre noeud.';

        }
        // dd(session()->get('name'));

          $new=Comments::create([
            'user_id'=>$request->session()->get('id'),
            'node_id'=>$id,
            'details'=>$request->details,
            'content'=>$request->content,

          ]);

            return back();
            // dd($request);
    }
    public function showComment($id){

        $comments=Comments::all();
        $node=\DB::table('nodes')
                    ->where('id',$id)
                    ->first();
        return view('user.comments',compact('comments','node'));
    }
    public function editComment($id){

        $comm=Comments:: where('id',$id)
                    ->first();
        $output='';
        $output .='<form >

                         <label class="form-label"for=""></label>
                         <input class="form-control" id="econtent" type="text" value="'.$comm->content.'">
                         <label class="form-label" for=""></label>
                         <textarea class="form-control" id="edetails" type="text" >'.$comm->details.'</textarea>
                         <button type="button"  type="submit" onclick="edit('.$comm->id.')" class="btn btn-primary mb-2 mt-2">Save changes</button>
                     </form>';
        echo json_encode([
         'output'=>$output
        ]);

    }
    public function updateComment(Request $request, $id){
            $update=Comments::where('id',[$id])->first();
            $update->content= $request->content;
            $update->details=$request->details;
            if($update->save())
                echo 1;
            else
                echo 0;
        exit;
    }

    public function deleteComment($id){
        Comments::where('id',[$id])
        ->delete();
        return back();
    }
}
