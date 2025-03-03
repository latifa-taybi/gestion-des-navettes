<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre', 'description', 'ville_depart', 'ville_arrivee',
        'date_depart', 'date_arrivee', 'place_dispo', 'prix', 'societe_id'
    ];   
}