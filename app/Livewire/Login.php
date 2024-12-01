<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Login extends Component
{
    public $client_id;
    public $message, $keyval;
    public $status = false;

    protected $rules = [
        'client_id' => 'required|string',
    ];

    public function login()
    {
        $this->validate();

        // URL de l'API
        $url = 'https://services.mobileid.dj/api/authenticatefromweb';


        $response = Http::withHeaders([
            'WebMobileIDAuthorization' => 'MTAwosgquz0k13y1n2axwejlm500d76br4',
            'Org' => 100,
        ])->post($url, [
            'client_id' => $this->client_id, 
        ]);

        // Traiter la réponse
        $responseData = $response->json();

        if ($responseData['status'] && $responseData['code'] === 703) {
            $this->status = true;
            $this->message = $responseData['message'];
            $this->keyval = $responseData['data']['keyval'];
        } else {
            $this->status = false;
            $this->message = $responseData['message'] ?? 'Une erreur inconnue est survenue.';
        }
    }

    public function checkStatus()
    {
        if (!$this->keyval) {
            $this->message = 'Aucune clé de validation disponible pour vérifier le statut.';
            $this->status = false;
            return;
        }

        $url = 'https://services.mobileid.dj/api/authenticate/checkStatus';

        $response = Http::withHeaders([
            'MobileIDAuthorization' => 'djmobilewqMoBileAuthen123456789aER==',
        ])->post($url, [
            'client_id' => $this->client_id,
            'keyval' => $this->keyval,
        ]);

        $responseData = $response->json();

        if ($responseData['status'] && $responseData['code'] === 800) {
            $this->message = 'Authentification confirmée : ' . $responseData['name'];
            $this->status = true;
        } else {
            $this->message = $responseData['message'] ?? 'Erreur lors de la vérification du statut.';
            $this->status = false;
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
