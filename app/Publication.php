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
}
