<?php

namespace App\Http\Controllers;

use App\Models\Ressources;
use Illuminate\Http\Request;

class RessourcesController extends Controller
{
    //
    public function newRessource(Request $request){

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

          $new=Ressources::create([
            'name'=>$request->name,
            'type'=>$request->type,
            'informations'=>$request->information,
          ]);

            return back();
            // dd($request);
    }

    public function showRessources(){
       $info='';
        $ressources=Ressources::all();
        return view('ressources',compact('ressources','info'));
    }
    public function editRessources($id){
        $info=Ressources::where('id',[$id])->first();
        // dd($info);
        $ressources=Ressources::all();
        return view('ressources',compact('info','ressources'));       
    }
    public function updateRessources(Request $request,$id){
        $infos=Ressources::where('id',[$id])->first();
        $infos->name=$request->name;
        $infos->type=$request->type;
        $infos->informations=$request->information;
        $infos->save();
        $info=Ressources::where('id',[$id])->first();
        // dd($info);
        $ressources=Ressources::all();
        return view('ressources',compact('info','ressources'));       
    }
    public function deleteRessource($id){
       
        Ressources::where('id',[$id])
        ->delete();
        return back();
    }
}
