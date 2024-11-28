<?php

namespace App\Livewire;

use App\Models\Patient;
use App\Models\RendezVous;
use Livewire\Component;

class GestionRendezvous extends Component
{

    public $rdvs; 
    public $rdv_id; 
    public $patient_id;  
    public $user_id;  
    public $date;
    public $heure; 
    public $motif; 
    public $specialite;  
     
    public $date2;
    public $heure2; 
    public $motif2; 
    public $specialite2;  
    public $createdby, $deletedby, $status, $status2 ;
    

    public function mount()
    {
        $this->user_id = session('id');  
        $patient = Patient::where('user_id', $this->user_id)->first(); 
        $this->patient_id = $patient->user_id;

    }
    public function close_modal()
    {
        $this->reset([
            'rdv_id', 'date', 'heure', 'motif', 'specialite', 'date2', 'heure2', 'motif2', 'specialite2', 'status2'
        ]);
        $this->resetValidation();
        $this->dispatch('close-modal');
    }

    public function getRdvs()
    { 
        $this->rdvs = RendezVous::where('patient_id', $this->patient_id)   
        ->orderBy("created_at", 'desc')
        ->get();
    }
 
    
    public function store()
    { 
        $rdv = new RendezVous();
        $rdv->patient_id = $this->patient_id;
        $rdv->user_id = $this->user_id;
        $rdv->date = $this->date;
        $rdv->specialite = $this->specialite;
        $rdv->motif = $this->motif; 
        $query = $rdv->save();

        if ($query) {
            $this->getRdvs();
            $this->close_modal();
            $this->dispatch(
                'alert',
                type: 'success',  
                message: 'Enregistrement réussi!'            
            );
        } else {
            $this->dispatch(
                'alert',
                type: 'error', 
                message: "Erreur lors de l'enregistrement!"
            );
        }
    }

    public function render()
    {
        $this->getRdvs();
        return view('livewire.gestion-rendezvous');
    }
}
