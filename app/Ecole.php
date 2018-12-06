<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ecole extends Model
{
    protected $fillable = [
        'ecole_name',
        'ecole_type',
        'ecole_representative',
        'ecole_address',
        'ecole_location',
        'ecole_phone',
    ];

    public function facultes()
    {
        return $this->hasMany(Faculte::class);
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}
