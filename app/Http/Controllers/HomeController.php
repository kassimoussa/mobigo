<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function accueil(Request $request)
    {
        if ($request->session()->has('id')) {
            return redirect('index');
        } else {
            return view('auth.loginid');
        }
    }

    public function login(Request $request)
    {
        //validate the input
        $request->validate([
            "email" => 'required',
            "password" => 'required', 
        ]);

        $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $user = User::where($field, $request->email)->first();
        if ($user) {
            if ($request->password == $user->password) {
                $request->session()->put('id', $user->id);
                $request->session()->put('level', $user->level);
                $request->session()->put('nom', $user->nom); 
                return redirect('index');
            } else {
                return back()->with('fail', "Erreur avec les informations de connexion");
            }
        } else {
            return back()->with('fail', "Désolé, nous ne reconnaissons pas cet identifiant. Veuillez vérifier que vous avez saisi le bon identifiant. ");
        }
    }
    

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }

    
    public function index()
    {
        $level = session('level');

        return view($level.'.index');
    }

    public function inscription()
    { 
        return view('auth.inscription');
    }

}
