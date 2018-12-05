<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memoire extends Model
{
    protected $fillable = [
        'user_id',
        'memoire_theme',
        'memoire_note',
        'memoire_description',
        'memoire_status',
        'memoire_publication_date',
    ];
}
