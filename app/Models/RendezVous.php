<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'patient_id',
        'user_id',
        'motif',
        'specialite',
        'date',
        'heure',
        'aprouvedby', 
        'deletedby', 
        'status',  
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function patient() {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
