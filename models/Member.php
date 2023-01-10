<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    protected $guard = 'member';

    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function attendances(){
        return $this->hasMany(Attendance::class);
    }

    public function leaves(){
        return $this->hasMany(Leave::class);
    }

    public function penalties(){
        return $this->hasMany(Penalty::class);
    }
}
