<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $fillable = [
        'filiere_name',
        'niveau_id',
    ];

    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}
