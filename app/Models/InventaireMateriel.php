<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventaireMateriel extends Model
{
    protected $table = 'INVENTAIREMATERIEL';

    protected $fillable = [
        'matriculeEmployee',
        'site',
        'nomEmployee',
        'serviceEmployee',
        'fonctionEmployee',
        'modelMateriel',
        'nomMateriel',
        'anneeAquisition',
    ];

    public $incrementing = false; // Désactive l'incrémentation automatique de la clé primaire
    protected $keyType = 'string'; // Définit le type de la clé primaire comme une chaîne

    // ...
}
