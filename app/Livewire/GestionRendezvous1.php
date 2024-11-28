<?php

namespace App\Livewire;

use App\Models\RendezVous;
use Livewire\Component;

class GestionRendezvous1 extends Component
{
    public $rdvs; 
    public $rdv_id; 
    public $admin_id;  
    public $date;
    public $heure; 
    public $motif; 
    public $specialite;  
     
    public $nom_patient; 

    public function mount()
    {
        $this->admin_id = session('id'); 
    }

    public function getRdvs()
    { 
        $this->rdvs = RendezVous::orderBy("created_at", 'desc')
        ->get();
    }

    
    public function close_modal()
    {
        $this->reset([
            'rdv_id', 'date', 'heure', 'motif', 'specialite', 'nom_patient' 
        ]);
        $this->resetValidation();
        $this->dispatch('close-modal');
    }

    public function loadid($rdv_id)
    {
        $this->rdv_id = $rdv_id;
        $rdv = RendezVous::find($rdv_id);
        $this->nom_patient = $rdv->user->nom;
        $this->date = $rdv->date;
        $this->motif = $rdv->motif;
        $this->specialite = $rdv->specialite;  
    }

    public function update()
    {
        $rdv = RendezVous::find($this->rdv_id);

        $query = $rdv->update([
            'status' => "Validé",
            'date' => $this->date, 
            'aprouvedby' => $this->admin_id, 
        ]);

        if ($query) {
            $this->close_modal();  
            $this->dispatch(
                'alert',
                type: 'success',
                message: 'Modification réussie !'
            );
        } else {
            $this->dispatch(
                'alert',
                type: 'error',
                message: "Erreur lors de la modification !"
            );
        }
    }
    public function render()
    {
        $this->getRdvs();
        return view('livewire.gestion-rendezvous1');
    }
}
