<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = [
        'user_id',
        'publication_type',
        'publication_description',
        'publication_file_path',
        'publication_target',
        'ecole_id',
        'faculte_id',
        'department_id',
        'noveau_id',
        'filiere_id',
        'publication_date',
        'publication_expiry_date',
    ];

    public function ecole()
    {
        return $this->belongsTo(Ecole::class);
    }

    public function faculte()
    {
        return $this->belongsTo(Faculte::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
