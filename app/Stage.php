<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $fillable = [
        'partenaire_id',
        'stage_lieux',
        'stage_description',
        'stage_period',
        'stage_debut',
        'stage_fin',
        'stage_expiry_date',
    ];
}
