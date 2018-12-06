<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'ecole_id',
        'publication_name',
        'publication_type',
        'publication_description',
        'publication_file_path',
        'publication_target',
        'publication_date',
        'publication_expiry_date',
        'publication_status',
    ];
    protected $dates = ['deleted_at'];

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
