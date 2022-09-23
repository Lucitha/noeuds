<?php

namespace App\Http\Controllers;

use App\Models\Nodes;
use Illuminate\Http\Request;

class NodesController extends Controller
{
    //
    public function newNode(Request $request){

        if(empty($request->name) && empty($request->type)&& empty($request->description)){
            $notify='Veuillez remplir tout les champs.';
 
        }else if(empty($request->name)){
             $notify= 'Veuillez saisir le nom de votre noeud.';

        }else if($request->type){
            $notify='Veuillez choisir le type de votre noeud.'; 

        }else if($request->description){
            $notify='La description sur ce noeud sont necessaire.';  

        }
        // dd($request);

          $new=Nodes::create([
            'name'=>$request->name,
            'type'=>$request->type,
            'description'=>$request->description,
          ]);

        return back();

            // dd($request);

    }

    public function deleteNode($id){
        
        Nodes::where('id',[$id])
        ->delete();
        return back();
    }
    public function editNode($id){
       
        $noeud=Nodes:: where('id',[$id])->first();
        return view( 'editNode',compact('noeud'));
    }
    public function showNode(){
       
        $nodes=Nodes::all();
        return view('list',compact('nodes'));
    }
    public function userShow(){
       
        $nodes=Nodes::all();
        return view('user.dashboard',compact('nodes'));
    }
   
    public function updateNode(Request $request, $id){
        // if(empty($request->name) && empty($request->type)&& empty($request->description)){
        //     $notify='Veuillez remplir tout les champs.';
 
        // }else if(empty($request->name)){
        //      $notify= 'Veuillez saisir le nom de votre noeud.';

        // }else if($request->type){
        //     $notify='Veuillez choisir le type de votre noeud.'; 

        // }else if($request->description){
        //     $notify='La description sur ce noeud sont necessaire.';  

        // }

        $noeud=Nodes:: where('id',[$id])->first();
        // dd($id);
        $noeud->name=$request->name;
        $noeud->type=$request->type;
        $noeud->description=$request->description;
        $noeud->save();
        
        $nodes=Nodes::all();
        return view('list',compact('nodes'));
    }

}
