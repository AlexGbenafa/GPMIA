<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeDotation extends Model
{
    protected $table = 'demandeMateriel';
    
    protected $fillable = [
        'numeroMatriculeEmployee',
        'nomEmployee',
        'prenomEmployee',
        'structureEmployee',
        'fonctionEmployee',
        'designationDemande',
    ];
}
