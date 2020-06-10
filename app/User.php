<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nick_us', 'nombre_us', 'app_us', 'apm_us', 'email_us', 'contrasena_us', 'rol_us', 'rfc_us'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'contrasena_us', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_us' => 'datetime',
    ];
    protected $primaryKey = 'id_us';

    
    //  login
    public function getAuthPassword()
    {
        return $this->contrasena_us;
    }

    // verificación de email
    public function getEmailForVerification()
    {
        return $this->email_us;
    }

    public function getEmailAttribute()
    {
        return $this->email_us;
    }

    // password
    public function getEmailForPasswordReset()
    {
        return $this->email_us;
    }

    public function setPasswordAttribute($value)
    {
        $this->contrasena_us = $value;
    }

    public function getIdusuario ()
    {
        return $this->id_us;
    }

}
