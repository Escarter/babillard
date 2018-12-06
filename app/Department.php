<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'department_name',
        'faculte_id',
    ];

    public function faculte()
    {
        return $this->belongsTo(Faculte::class);
    }

    public function niveaux()
    {
        return $this->hasMany(Niveau::class);
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}
