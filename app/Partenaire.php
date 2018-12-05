<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    protected $fillable = [
        'partenaire_name',
        'partenaire_representative',
        'partenaire_logo',
        'partenaire_location',
        'partenaire_email',
        'partenaire_phone',
        'partenaire_username',
        'partenaire_password',
        'partenaire_lod',
    ];
}
