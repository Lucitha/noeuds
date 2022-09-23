<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function addUser(Request $request){

        if(empty($request->name) && empty($request->surname)&& empty($request->email) && empty($request->password)&& empty($request->vpassword)){
            $notify='Veuillez remplir tout les champs.';
 
        }else if(empty($request->email)){
             $notify= 'Veuillez renseigner votre email.';

        }else if($request->password){
            $notify='Veuillez insérer le mot de passe.';  

        }else if($request->vpassword){
            $notify='Veuillez confirmer le mot de passe.';  

        }else if($request->surname){
            $notify='Veuillez renseigner le prénom.';  

        }else if($request->name){
            $notify='Veuillez renseigner le nom.';  

        }else if($request->password !== $request->vpassword){
            $notify='Mot de passe mal renseigné.';  
        }
        dd($request);

        $pass=password_hash($request->password, PASSWORD_DEFAULT);

        \DB:: table('users')
            ->insert(['name'=>$request->name, 
                'surname'=>$request->surname, 
                'email'=>$request->email,
                'password'=>$pass]);
        return view('welcome');
    }

    public function connexion(Request $request){

        if(empty($request->email) && empty($request->password)){
            $notify='Veuillez remplir tout les champs.';
 
        }else if(empty($request->email)){
             $notify= 'Veuillez renseigner votre email.';

        }else if($request->password){
            $notify='Veuillez insérer le mot de passe.';  

        }
        // dd($request);
        $user=\DB::table('users')
                ->where ('email',$request->email)
                ->select('*')
                ->get();
                // dd($user);

        if(!$user){
            $notify='Veuillez vous enregistrer d\'abord';
        } elseif (password_verify($request->password,$user->password)) {
            $notify='Mot de passe incorrect';
        }
    }
}
