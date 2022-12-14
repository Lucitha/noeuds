<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilisateursController extends Controller
{
    //
    public function login(){
        return view('welcome');
    }


    public function addUser(Request $request){

        $this->validate($request, [
            'name' => "required|string|min:2",
            'email' => "required|email",
            'surname' => "required|string|min:2",
            'password' => "required|min:6",
            'vpassword' => "required|min:6"
        ]);

        // if(empty($request->name) && empty($request->surname)&& empty($request->email) && empty($request->password)&& empty($request->vpassword)){
        //     $notify='Veuillez remplir tout les champs.';

        // }else if(empty($request->email)){
        //      $notify= 'Veuillez renseigner votre email.';

        // }else if($request->password){
        //     $notify='Veuillez insérer le mot de passe.';

        // }else if($request->vpassword){
        //     $notify='Veuillez confirmer le mot de passe.';

        // }else if($request->surname){
        //     $notify='Veuillez renseigner le prénom.';

        // }else if($request->name){
        //     $notify='Veuillez renseigner le nom.';

        // }else if($request->password !== $request->vpassword){
        //     $notify='Mot de passe mal renseigné.';
        // }
        // dd($request);

        $pass=password_hash($request->password, PASSWORD_DEFAULT);

        \DB:: table('utilisateurs')
            ->insert(['name'=>$request->name,
                'surname'=>$request->surname,
                'email'=>$request->email,
                'password'=>$pass,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ]);

        return $this->login();

    }


    public function connexion(Request $request){

        $this->validate($request, [
            'email' => "required|email",
            'password' => "required|min:6'",
        ]);

        // if(empty($request->email) && empty($request->password)){
        //     $notify='Veuillez remplir tout les champs.';

        // }else if(empty($request->email)){
        //      $notify= 'Veuillez renseigner votre email.';

        // }else if($request->password){
        //     $notify='Veuillez insérer le mot de passe.';

        // }
        // dd($request->email);
        // dd($user->password);
        $user=\DB::table('utilisateurs')
                ->where ('email',$request->email)
                ->select('*')
                ->first();
        // dd($user->password);



        if(!$user){
            return redirect('/register');
        } elseif (!password_verify($request->password,$user->password)) {
            return redirect('/');
        }else{
            foreach ($user as $key => $value) {
                session()->put($key,$value);
                session()->save();
            }
            // session()->put('id',$user->id);


        // dd(session()->get('name'));
            return redirect('/nodes');
        }
    }
    public function deconnexion(){
        session()->flush();
        return redirect('/');
    }
}
