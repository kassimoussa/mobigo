<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $user;
    public $email;
    public $password;
    public $client_id;
    public $message, $keyval;
    public $status = false;
    public $step = 1;
    public $isChecking = false;

    protected $rules = [
        'client_id' => 'required|string',
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validateOnly('email');
        $this->validateOnly('password');

        // Rechercher l'utilisateur par son email
        $this->user = User::where('email', $this->email)->first();

        if ($this->user && $this->user->password === $this->password) {
            $this->status = true;

            if ($this->user->level == 1) { 
                // Stocker les informations dans la session
                session()->put('id', $this->user->id);
                session()->put('level', $this->user->level);
                session()->put('nom', $this->user->nom);
                $this->message = 'Connexion réussie. Bienvenue !';
                $this->status = true;
                return redirect('index');
            } elseif ($this->user->level == 2) {
                // Étape suivante pour les utilisateurs de niveau 2
                $this->step = 2; 
                $this->message = 'Connexion réussie. Veuillez entrer votre Client ID.';
                $this->status = true;
            }
        } else {
            $this->message = 'Email ou mot de passe incorrect.';
            $this->status = false;
        }
    }


    public function sendNotif()
{
    $this->validate();

    $response = Http::withHeaders([
        'WebMobileIDAuthorization' => 'MTAwosgquz0k13y1n2axwejlm500d76br4',
        'Org' => 100,
    ])->post('https://services.mobileid.dj/api/authenticatefromweb', [
        'client_id' => $this->client_id,
    ]);

    $responseData = $response->json();

    if ($responseData['status'] && $responseData['code'] === 703) {
        $this->keyval = $responseData['data']['keyval'];
        $this->status = true; 
        $this->message = 'Notification envoyée';
        $this->isChecking = true; // Ceci déclenchera le polling
    } else {
        $this->status = false;
        $this->dispatch(
            'alert',
            type: 'error',  
            message: $responseData['message']            
        );
        $this->message = $responseData['message'] ?? 'Une erreur inconnue est survenue.';
    }
}

public function authenticateClientId()
{
    if (!$this->isChecking || !$this->keyval) {
        $this->isChecking = false;
        return;
    }

    $response = Http::withHeaders([
        'MobileIDAuthorization' => 'djmobilewqMoBileAuthen123456789aER==',
    ])->post('https://services.mobileid.dj/api/authenticate/checkStatus', [
        'client_id' => $this->client_id,
        'keyval' => $this->keyval,
    ]);

    $responseData = $response->json();

    if ($responseData['status'] && $responseData['code'] === 800) { 
        $this->isChecking = false; // Arrête le polling
        session()->put('id', $this->user->id);
        session()->put('level', $this->user->level);
        session()->put('nom', $this->user->nom);
        $this->message = 'Authentification confirmée : ' . $responseData['name'];
        $this->status = true;
        return redirect('index');
    }
}

    public function render()
    {
        return view('livewire.login');
    }
}
