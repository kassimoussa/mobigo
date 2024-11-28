<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function register(Request $request){
        $request->validate([
            "nom" => 'required',
            "cni" => 'required', 
            "ssn" => 'required', 
            "sexe" => 'required', 
            "date_naissance" => 'required', 
            "lieu_naissance" => 'required', 
            "telephone" => 'required', 
            "email" => 'required', 
            "password" => 'required', 
            "adresse" => 'required', 
        ]);

        $user = User::where('cni', '=', $request->cni)->first();
        if ($user) {
            return back()->with('fail', 'Un utilisateur avec ce CNI existe deja !');
        } else {

            $newuser = new User();
            $newuser->nom = $request->nom; 
            $newuser->cni = $request->cni;
            $newuser->telephone = $request->telephone;  
            $newuser->email = $request->email; 
            $newuser->password = $request->password; 
            $newuser->level = '2';  
            $query1 =  $newuser->save();

            $patient = new Patient();
            $patient->user_id = $newuser->id;  
            $patient->ssn = $request->ssn; 
            $patient->sexe = $request->sexe;
            $patient->date_naissance = $request->date_naissance;
            $patient->lieu_naissance = $request->lieu_naissance;   
            $patient->adresse = $request->adresse;  
            $query2 =   $patient->save();
            if($query1 && $query2){
                return back()->with('success', 'Inscription réussi');
            } else {
                return back()->with('fail', "Echec lors de l'inscription!");
            }
        }
    }

    public function medical(){
        return view("2.medical.index");
    }
    public function rendezvous(){
        return view("2.medical.rendezvous");
    }
}
