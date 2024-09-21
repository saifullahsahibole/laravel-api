<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    protected $fillable = [
        'first_name', 'last_name', 'date_of_birth', 'gender', 'email', 'password'
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function timesheets()
    {
        return $this->hasMany(Timesheet::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(array $customClaims = [])
    {
        return [];
    }
}
