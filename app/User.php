<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'ecole_id',
        'faculte_id',
        'department_id',
        'niveau_id',
        'filiere_id',
        'user_type',
        'user_matricule',
        'user_phone',
        'user_dob',
        'user_place_of_birth',
        'user_lod',
        'user_description',
        'user_avatar',
        'email',
        'email_verified_at',
        'password',
        'first_login',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isInternal()
    {
        if ($this->user_type == 'internal') {
            return true;
        }

        return false;
    }
}
