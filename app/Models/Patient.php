<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'ssn',
        'sexe',
        'adresse',
        'lieu_naissance',
        'date_naissance', 
        'filename', 
        'public_path', 
        'storage_path', 
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rdvs() {
        return $this->hasMany(RendezVous::class,);
    } 
}
