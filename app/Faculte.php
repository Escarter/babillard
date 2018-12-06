<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculte extends Model
{
    protected $fillable = [
        'faculte_name',
        'ecole_id',
    ];

    public function ecole()
    {
        return $this->belongsTo(Ecole::class);
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}
