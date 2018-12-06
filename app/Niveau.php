<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $fillable = [
        'niveau_name',
        'department_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function filieres()
    {
        return $this->hasMany(Filiere::class);
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}
