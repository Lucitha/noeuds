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
        // dd($request);

          $new=Comments::create([
            'user_id'=>1,
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
    public function updateComment(Request $request, $id){
       
        $update=Comments::where('id',[$id])->first();

            $update->content= $request->content;
            // $update->details=$request->details;
            $update->save();
        return back();
    }
    public function deleteComment($id){
       
        Comments::where('id',[$id])
        ->delete();
        return back();
    }
}
